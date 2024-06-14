<template>

    <Head title="Directorio" />

    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <!-- MENU -->
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


        </div>

        <!-- SIDEBAR -->
        <div class="sidebar flex flex-col p-6 bg-white shadow-lg fixed  top-1/2 transform -translate-y-1/2 rounded-lg">
            <h2 class="text-xl font-semibold mb-4">Países</h2>
            <button @click="filterByCountry('')" :class="{ 'active': selectedCountry === '' }"
                class="filter-btn mb-2 text-left focus:outline-none">
                Todos
            </button>
            <button v-for="country in countries" :key="country" @click="filterByCountry(country)"
                :class="{ 'active': selectedCountry === country }" class="filter-btn mb-2 text-left focus:outline-none">
                {{ country }}
            </button>
        </div>


        <!-- CONTENIDO -->
        <div class="max-w-7xl mx-auto p-6 lg:p-8 "> <!-- Adjusted margin for sidebar -->
            <div class="flex justify-center mb-8">
                <svg viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="h-16 w-auto bg-gray-100 dark:bg-gray-900">
                    <!-- SVG content -->
                </svg>
            </div>

            <div class="mt-16 text-center">
                <h1 class="text-2xl font-bold mb-4 text-center">Directorio de Iglesias</h1>

                <div v-if="filteredEstablished.length" class="mb-3">
                    <h2 class="text-xl font-semibold mb-2 text-center">Establecidas</h2>
                    <div
                        :class="filteredEstablished.length <= 2 ? 'flex justify-center' : 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-8'">
                        <div v-for="church in filteredEstablished" :key="church.id"
                            class="bg-white shadow-md rounded-lg p-6 mx-auto w-full sm:w-5/6 lg:w-4/5">
                            <h2 class="text-xl font-semibold mb-2 text-center">{{ church.nombre }}</h2>
                            <p class="text-gray-600 mb-1"><strong>Estado:</strong> {{ church.estado }}</p>
                            <p class="text-gray-600"><strong>País:</strong> {{ church.pais }}</p>

                            <Link :href="route('church', { id: church.id })"
                                class="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            Ver mas
                            </Link>
                        </div>
                    </div>
                </div>

                <div v-if="filteredMissions.length">
                    <h2 class="text-xl font-semibold mb-2 text-center">Misión</h2>
                    <div
                        :class="filteredMissions.length <= 2 ? 'flex justify-center' : 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-8'">
                        <div v-for="church in filteredMissions" :key="church.id"
                            class="bg-white shadow-md rounded-lg p-6 mx-auto w-full sm:w-5/6 lg:w-4/5">
                            <h2 class="text-xl font-semibold mb-2 text-center">{{ church.nombre }}</h2>
                            <p class="text-gray-600 mb-1"><strong>Estado:</strong> {{ church.estado }}</p>
                            <p class="text-gray-600"><strong>País:</strong> {{ church.pais }}</p>

                            <Link :href="route('church', { id: church.id })"
                                class=" ms-4 font-semibold  hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 bg-blue-500 text-white px-4 py-2 rounded-lg"
                                style="background-color: #4741D7;">
                            Ver mas
                            </Link>
                        </div>
                    </div>
                </div>

                <div v-if="filteredReform.length">
                    <h2 class="text-xl font-semibold mb-2 text-center">En Proceso de Reforma</h2>
                    <div
                        :class="filteredReform.length <= 2 ? 'flex justify-center' : 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8'">
                        <div v-for="church in filteredReform" :key="church.id"
                            class="bg-white shadow-md rounded-lg p-6 w-full sm:w-5/6 lg:w-4/5 mb-8">
                            <h2 class="text-xl font-semibold mb-2 text-center">{{ church.nombre }}</h2>
                            <p class="text-gray-600 mb-1"><strong>Estado:</strong> {{ church.estado }}</p>
                            <p class="text-gray-600"><strong>País:</strong> {{ church.pais }}</p>

                            <router-link :to="{ name: 'church', params: { id: church.id } }"
                                class="block mt-4 text-center text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                Ver más
                            </router-link>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>


<!-- Script para filtrado -->
<script>
import { Head, Link, usePage } from '@inertiajs/inertia-vue3';
export default {
    components: {
        Head,
        Link
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        established: Array,
        missions: Array,
        reform: Array,
        countries: Array,
    },
    data() {
        return {
            selectedCountry: '',
        };
    },
    computed: {
        filteredEstablished() {
            return this.selectedCountry
                ? this.established.filter(church => church.pais === this.selectedCountry)
                : this.established;
        },
        filteredMissions() {
            return this.selectedCountry
                ? this.missions.filter(church => church.pais === this.selectedCountry)
                : this.missions;
        },
        filteredReform() {
            return this.selectedCountry
                ? this.reform.filter(church => church.pais === this.selectedCountry)
                : this.reform;
        },
    },
    methods: {
        filterByCountry(country) {
            this.selectedCountry = country;
        },
    },
}
</script>

<!-- Estilos de vista (cards y sidebar -->
<style scoped>
.grid {
    display: grid;
    gap: 20px;
    /* Ajusta el espacio entre las tarjetas a 20px */
}

.card {
    background-color: white;
    border-radius: 0.5rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 1.5rem;
    max-width: 100%;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: auto;
}

.text-center {
    text-align: center;
}

.sidebar {
    left: 5rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    align-items: center;
    position: fixed;
    top: 50%;
    transform: translateY(-50%);
    padding: 1rem;
    border-radius: 10px;
    background-color: #ffffff;
}

.filter-btn {
    color: #4741d7;
    transition: background-color 0.3s, color 0.3s;
    padding: 0.5rem 1rem;
    border-radius: 999px;
    margin-bottom: 0.5rem;
    text-align: center;
    width: 100%;
}

.filter-btn:hover {
    background-color: rgba(71, 65, 215, 0.1);
}

.filter-btn.active {
    background-color: #4741d7;
    color: white;
    font-weight: bold;
}

.sidebar h2 {
    text-align: center;
    font-size: 1.5rem;
    font-weight: bold;
    margin-bottom: 1rem;
}

.link-style {
    margin-left: 1rem;
    font-weight: 600;
    color: #6366f1;
    transition: background-color 0.3s, color 0.3s;
    text-decoration: none;
    cursor: pointer;
    background-color: #4741D7;
    color: #ffffff;
    padding: 0.75rem 1.5rem;
    border-radius: 9999px;
    display: inline-block;
}

.link-style:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.5);
}

.rounded-lg {
    margin-left: 20px;
}
</style>
