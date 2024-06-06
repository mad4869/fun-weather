<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';

import Layout from '@/Layouts/Layout.vue';
import Modal from '@/Components/Modal.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import WeatherDetails from '@/Components/WeatherDetails.vue';
import useFetchLocation from '@/Composables/useFetchLocation';
import type { WeatherData } from '@/types/data';

const props = defineProps<{ weatherData: WeatherData | null }>();

const isModalOpen = ref(false);

const city = ref('');

const form = useForm({
    location: '',
});

const fetchWeatherData = () => {
    form.post('/', {
        preserveScroll: true,
    })
};

const fetchCurrentLocation = async () => {
    const currentLocation = await useFetchLocation();
    form.location = currentLocation
    fetchWeatherData();
}

const fetchAnotherLocation = () => {
    form.location = city.value;
    fetchWeatherData();
};

onMounted(() => {
    fetchCurrentLocation();
});
</script>

<template>

    <Head title="Home" />
    <Layout>
        <div v-if="props.weatherData" class="flex flex-col items-center gap-8">
            <p class="text-xl">Weather information around</p>
            <h1 class="text-6xl font-bold text-center sm:text-9xl">{{ props.weatherData.location.name }}</h1>
            <div class="flex items-center justify-center gap-8">
                <div class="flex items-center gap-4">
                    <img :src="props.weatherData.current.condition.icon" />
                    <p class="text-4xl font-semibold">{{ props.weatherData.current.condition.text }}</p>
                </div>
                <SecondaryButton @click="isModalOpen = true" title="See more details about the current weather">
                    More details
                </SecondaryButton>
            </div>
            <form class="flex items-center h-10 gap-2" @submit.prevent="fetchAnotherLocation">
                <TextInput v-model:model-value="city" />
                <PrimaryButton title="Check weather on other location">Check</PrimaryButton>
            </form>
            <Modal :show="isModalOpen" @clicked-outside="isModalOpen = false">
                <WeatherDetails :weatherData="props.weatherData" />
            </Modal>
        </div>
        <div v-else class="flex flex-col items-center">
            <p class="text-4xl font-semibold">No weather data available.</p>
        </div>
    </Layout>
</template>
