<template>
    <footer class="text-white bg-gradient-to-t from-gray-800 from-50% to-transparent">
        <nav class="container flex items-center justify-center h-16 mx-auto">
            <p>
                &copy; {{ new Date(Date.now()).getFullYear() }} - Powered by <a href="https://www.weatherapi.com/"
                    class="hover:underline" title="Go to Weather API" target="_blank">Weather
                    API</a>
            </p>
        </nav>
    </footer>
</template>