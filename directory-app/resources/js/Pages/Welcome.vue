<template>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <Head title="Welcome" />
    <div>
    <!-- Otros elementos de la vista -->
    <MenuComponent :canLogin="true" :canRegister="false" laravelVersion="8.x" phpVersion="7.4" />
  </div>

    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-light dark:bg-gray-900 selection:bg-red-500 selection:text-white">







        <div class="max-w-7xl mx-auto p-6 lg:p-8">
          
            
            <div class="mt-16">
                <a href="https://laravel.com/docs"
                        class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div>
                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Propósito</h2>
                            <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                Laravel has wonderful documentation covering every aspect of the framework. Whether you
                                are a newcomer or have prior experience with Laravel, we recommend reading our
                                documentation from beginning to end.
                            </p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                    </a>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                    <a href="https://laravel.com/docs"
                        class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div>
                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Propósito</h2>
                            <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                Laravel has wonderful documentation covering every aspect of the framework. Whether you
                                are a newcomer or have prior experience with Laravel, we recommend reading our
                                documentation from beginning to end.
                            </p>
                        </div>
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
                            tendrás acceso a direcciones, teléfonos, redes sociales y ¡mucho más! Únete a este
                            directorio llenando el formulario ubicado <a href="">aquí</a>.
                        </p>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                    </div>

                    <!-- Map Section -->
                    <div
                        class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex flex-col motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Map</h2>
                        
                    </div>

                    <!-- Link to Congreso -->
                    <a href="https://congreso.sbcm1689.org">
                        <div
                            class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex flex-col motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Congreso Nacional de
                                Pastores</h2>
                            <p class="text-center"></p>
                            <div id="map"
                                class="mt-4 h-64 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                <p class="text-centered">Aqui va una imagen</p>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div>
    

</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import L from 'leaflet';
import MenuComponent from '@/Components/MenuComponent.vue';



</script>
