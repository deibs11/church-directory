<template>

    <Head title="Directorio" />
    <MenuComponent :canLogin="true" :canRegister="false" laravelVersion="8.x" phpVersion="7.4" />

    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <!-- MENU -->

        <!-- SIDEBAR -->
        <div class="sidebar flex flex-col p-6 bg-white shadow-lg fixed  top-1/2 transform -translate-y-1/2 ">
            <h2 class="text-xl font-semibold mb-4">País</h2>
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
        <div class="max-w-7xl mx-auto p-6 lg:p-8 ">

            <div class="mt-16 text-center">
                <div v-if="filteredEstablished.length" class="mb-3">
                    <h2 class="text-xl font-semibold mb-2 text-center">Constituidas</h2>
                    <div
                        :class="filteredEstablished.length <= 1 ? 'flex justify-center' : 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-8'">
                        <div v-for="church in filteredEstablished" :key="church.id"
                            class="bg-white shadow-md rounded-lg p-6 mx-auto w-full sm:w-5/6 lg:w-4/5">
                            <Link :href="route('church', { id: church.id })"
                                class="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            <h2 class="text-xl font-semibold mb-2 text-center">{{ church.nombre }}</h2>
                            <p class="text-gray-600 mb-1"><strong>Estado:</strong> {{ church.estado }}</p>
                            <p class="text-gray-600"><strong>Ciudad:</strong> {{ church.ciudad }}</p>

                            
                            </Link>

                        </div>
                    </div>
                </div>

                <div v-if="filteredMissions.length" class="mb-3">
                    <h2 class="text-xl font-semibold mb-2 text-center">Misión</h2>
                    <div
                        :class="filteredMissions.length <= 2 ? 'flex justify-center' : 'grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-3 gap-8 mb-8'">
                        <div v-for="church in filteredMissions" :key="church.id"
                            class="bg-white shadow-md rounded-lg p-6 mx-auto w-full sm:w-5/6 lg:w-4/5">
                            <h2 class="text-xl font-semibold mb-2 text-center">{{ church.nombre }}</h2>
                            <p class="text-gray-600 mb-1"><strong>Estado:</strong> {{ church.estado }}</p>
                            <p class="text-gray-600"><strong>Ciudad:</strong> {{ church.ciudad }}</p>

                            <Link :href="route('church', { id: church.id })"
                                class="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-arrow-right-circle-fill inline-block align-middle ms-1"
                                viewBox="0 0 16 16">
                                <path
                                    d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                            </svg>
                            </Link>

                        </div>
                    </div>
                </div>

                <div v-if="filteredReform.length" class="mb-3">
                    <h2 class="text-xl font-semibold mb-2 text-center">En Proceso de Reforma</h2>
                    <div
                        :class="filteredReform.length <= 2 ? 'flex justify-center' : 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-8'">
                        <div v-for="church in filteredReform" :key="church.id"
                            class="bg-white shadow-md rounded-lg p-6 mx-auto w-full sm:w-5/6 lg:w-4/5">
                            <h2 class="text-xl font-semibold mb-2 text-center">{{ church.nombre }}</h2>
                            <p class="text-gray-600 mb-1"><strong>Estado:</strong> {{ church.estado }}</p>
                            <p class="text-gray-600"><strong>Ciudad:</strong> {{ church.ciudad }}</p>

                            <Link :href="route('church', { id: church.id })"
                                class="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-arrow-right-circle-fill inline-block align-middle ms-1"
                                viewBox="0 0 16 16">
                                <path
                                    d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                            </svg>
                            </Link>

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
import MenuComponent from '@/Components/MenuComponent.vue';
export default {
    components: {
        Head,
        Link,
        MenuComponent
    },
    components: {
        Head,
        Link,
        MenuComponent
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
    max-width: 100%;
    /* Ajusta la anchura máxima */
    margin-left: auto;
    margin-right: auto;
    margin-bottom: auto;
    margin-bottom: auto;
}

.text-center {
    text-align: center;
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
    text-align: center;
    justify-content: center;
}

.sidebar {
    top: 20%;
    left: 10;
    right: 10;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    /* Centra el contenido horizontalmente */
    padding: 1rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 0;
    background-color: #ffffff;
    border-radius: 20px;
}



.filter-btn.active {
    background-color: #4741d7;
    /* Color de fondo activo */
    color: white;
    /* Color de texto activo */
    font-weight: bold;
    /* Negrita para texto activo */
}

.sidebar h2 {
    text-align: center;
    /* Alineación del título */
    font-size: 1.5rem;
    /* Tamaño de fuente del título */
    font-weight: bold;
    /* Negrita para el título */

    /* Margen inferior del título */
    margin-right: 10px;
}

.link-style {
    margin-left: 1rem;
    /* Espacio a la izquierda del enlace */
    font-weight: 600;
    /* Peso de la fuente */
    color: #6366f1;
    /* Color de texto normal */
    transition: background-color 0.3s, color 0.3s;
    /* Transiciones suaves de color de fondo y texto */

    /* Estilo de enlace */
    text-decoration: none;
    cursor: pointer;

    /* Estilo de fondo cilíndrico */
    background-color: #4741D7;
    /* Color de fondo azul */
    color: #ffffff;
    /* Color de texto blanco */
    padding: 0.75rem 1.5rem;
    /* Relleno interno */
    border-radius: 9999px;
    /* Radio grande para hacer un fondo cilíndrico */
    display: inline-block;
    /* Bloque de visualización inline */
}

/* Estilo de enlace al colocar el mouse sobre el enlace 

/* Estilo de enlace al enfocarse en el enlace */
.link-style:focus {
    outline: none;
    /* Eliminar el contorno predeterminado */
    box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.5);
    /* Sombra alrededor del enlace al enfocarse */
}

/* Media queries */
@media (max-width: 640px) {
    .sidebar {
    top: 8%; /* Mantiene el 20% desde la parte superior */
    left: 50%; /* Centra horizontalmente */
    transform: translateX(-50%); /* Ajusta la posición hacia la izquierda en un 50% del ancho del contenedor */
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    padding: 1rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 20px;
    background-color: #ffffff;
}

}
</style>
