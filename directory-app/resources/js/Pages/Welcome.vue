<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    churches: Array,  // Añadido para recibir la lista de iglesias
});
</script>

<template>

    <Head title="Welcome" />

    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:end-0 p-6 text-end z-10">
            
            <!-- Navegacion ordinaria -->
            <Link :href="route('Inicio')"
                class="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
            Inicio
            </Link>

            <Link :href="route('Directorio')"
                class="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
            Directorio
            </Link>

            <!-- Navegacion para el dashboard -->
            <Link v-if="canLogin" :href="route('login')"
                class="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
            Login
            </Link>

            <Link v-if="canRegister" :href="route('register')" class="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</Link>


        </div>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center mb-8">
                <svg viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="h-16 w-auto bg-gray-100 dark:bg-gray-900">
                    <!-- SVG content -->
                </svg>
            </div>

            <div class="mt-16">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                    <a href="https://laravel.com/docs"
                        class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div>
                            <div
                                class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                    <!-- SVG path -->
                                </svg>
                            </div>
                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Documentation</h2>
                            <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                Laravel has wonderful documentation covering every aspect of the framework. Whether you
                                are a
                                newcomer or have prior experience with Laravel, we recommend reading our documentation
                                from
                                beginning to end.
                            </p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                            <!-- SVG path -->
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                    </a>

                    <!-- Other existing links -->

                    <!-- New Section: List of Churches -->
                    <div
                        class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex flex-col motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Church Directory</h2>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            Un directorio amplio, rápido y sencillo. Contamos con iglesias en toda Latinoamérica, donde
                            tendrás
                            acceso a direcciones, teléfonos, redes sociales !y mucho más!

                            Únete a este directorio llenando el formulario ubicado <a href="">aquí</a>
                        </p>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                    </div>

                    <!-- Map Section Placeholder -->
                    <div
                        class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex flex-col motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Map</h2>
                        <div id="map" class="mt-4 h-64 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                            <p class="text-center">
                                Ver Mapa
                            </p>
                        </div>
                    </div>

                    <!-- Direccionamiento a la página del Congreso -->
                    <a href="https://congreso.sbcm1689.org">
                        <div
                        class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex flex-col motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Congreso Nacional de Pastores
                        </h2>
                        <p class="text-center"></p>
                        <div id="map" class="mt-4 h-64 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                            <p class="text-centered">Aqui va una imagen</p>
                        </div>
                    </div>
                    </a>
                    
                </div>
            </div>
        </div>
    </div>
</template>