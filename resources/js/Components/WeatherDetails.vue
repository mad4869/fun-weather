<script setup lang="ts">
import type { WeatherData } from '@/types/data';

const props = defineProps<{ weatherData: WeatherData }>();
</script>

<template>
    <div class="flex flex-col items-center gap-4">
        <div>
            <span class="flex flex-col items-center text-2xl text-center sm:text-4xl">
                <p>Weather Details in</p>
                <strong>{{ props.weatherData.location.name }}</strong>
            </span>
            <p class="italic text-center">Last Updated: {{ props.weatherData.current.last_updated }}</p>
        </div>
        <div>
            <p><strong>Temperature</strong>: {{ props.weatherData.current.temp_f }}° F</p>
            <p><strong>Feels Like</strong>: {{ props.weatherData.current.feelslike_f }}° F</p>
            <p><strong>Wind</strong>: {{ props.weatherData.current.wind_mph }} mph</p>
            <p><strong>Wind Gust</strong>: {{ props.weatherData.current.gust_mph }} mph</p>
            <p><strong>Wind Direction</strong>: {{ props.weatherData.current.wind_dir }}</p>
            <p><strong>Humidity</strong>: {{ props.weatherData.current.humidity }}%</p>
            <p><strong>UV Index</strong>: {{ props.weatherData.current.uv }}</p>
            <p><strong>Cloud</strong>: {{ props.weatherData.current.cloud }}</p>
            <p><strong>Visibility</strong>: {{ props.weatherData.current.vis_miles }} miles</p>
            <p><strong>Precipitation</strong>: {{ props.weatherData.current.precip_in }} inches</p>
            <p><strong>Pressure</strong>: {{ props.weatherData.current.pressure_in }} in</p>
        </div>
    </div>
</template>