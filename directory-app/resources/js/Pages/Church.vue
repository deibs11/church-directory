<template>
     <Head title="Directorio" />
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-900" >
        <div
            class="grid grid-cols-1 max-w-xl p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Información General</h2>
            <p><strong>Estado:</strong> {{ church.estado }}</p>
            <p><strong>Ciudad:</strong> {{ church.ciudad }}</p>
            <p><strong>Dirección:</strong> {{ church.direccion }}</p>
            <p><strong>Código Postal:</strong> {{ church.cp }}</p>
            <p><strong>Teléfono:</strong> {{ church.telefono }}</p>

            
            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Redes Sociales</h2>
            <p><strong>Sitio web: </strong>
                <a :href="church.pagina_web" target="_blank" rel="noopener noreferrer" class="custom-link">
                    {{ church.pagina_web }}
                </a>
            </p>
            <p><strong>Facebook: </strong>
                <a :href="church.pagina_web" target="_blank" rel="noopener noreferrer" class="custom-link">
                    {{ church.facebook }}
                </a>
            </p>
            <p><strong>Instagram:</strong> {{ church.instagram }}</p>
        </div>
        
        <button @click="goBack" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                Atrás
            </button>
    </div>

    <div>
      <ChurchMap :churches="churches" />
    </div>
</template>

<script>
import { Head, Link, usePage } from '@inertiajs/inertia-vue3';
import DOMPurify from 'dompurify';
import { Inertia } from '@inertiajs/inertia';
import {onMounted} from 'vue';
import L from 'leaflet';

export default {
    components: {
        Head,
        Link
    },
    props: {
        church: {
            type: Object,
            required: true
        }
    },
    computed: {
        sanitizedMap() {
            return DOMPurify.sanitize(this.church.mapa, {
                ADD_TAGS: ['iframe'],
                ADD_ATTR: ['src', 'width', 'height', 'frameborder', 'allow', 'allowfullscreen', 'aria-hidden', 'tabindex', 'style']
            });
        }
    },
    methods: {
        goBack() {
            Inertia.visit('/directorio');
        }
    }
};
</script>

<style scoped>
.custom-link {
  color: #1a73e8;
  text-decoration: underline;
  transition: color 0.3s ease;
}

.custom-link:hover {
  color: #d61a3c;
  text-decoration: none;
}
</style>
