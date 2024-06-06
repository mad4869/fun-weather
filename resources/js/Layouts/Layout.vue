<script setup lang="ts">
import Header from './Header.vue';
import Footer from './Footer.vue';
</script>

<template>
    <Header />
    <main class="flex items-center justify-center text-white h-main">
        <slot />
    </main>
    <Footer />
</template>

<style scoped>
.h-main {
    min-height: calc(100dvh - 8rem);
}
</style>