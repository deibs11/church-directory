<template>

  <Head title="Mapa" />
  <MenuComponent :canLogin="true" :canRegister="false" laravelVersion="8.x" phpVersion="7.4" />
  <div v-if="canLogin" class=" sm:top-0 sm:end-0 p-6 text-end z-10">
    

  </div>


  <div class="flex justify-center">
    <div id="title">
      <h1 class="text-3xl">Mapa General</h1>
    </div>
  </div>

  <div id="map-container" class="flex justify-center mt-10">
    <div id="map" class="map-square bg-gray-200 dark:bg-gray-700"></div>
</div>



</template>

<style>
.map-square {
    width: 80vw;
    height: 80vh;
    border-radius: 10px; /* Esquinas redondeadas opcionales */
}

#title {
  display: inline-block;
  background-color: #1d4ed8;
  color: white;
  text-align: center;
  padding: 0.5rem 1rem;
  /* Ajusta según la necesidad */
  border-radius: 15px;
  /* Opcional: para esquinas redondeadas */
}
</style>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import L from 'leaflet';
import 'leaflet/dist/leaflet.css';
import MenuComponent from '@/Components/MenuComponent.vue';

// Define props
const props = defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
  laravelVersion: String,
  phpVersion: String,
  churches: Array,  // Asegúrate de que esta línea esté presente y correcta
});

onMounted(() => {
  const map = L.map('map').setView([0, 0], 4);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

  if (props.churches.length > 1) {
    const bounds = props.churches.map(church => [church.latitud, church.longitud]);
    map.fitBounds(bounds);
  }

  props.churches.forEach(church => {
    L.marker([church.latitud, church.longitud])
      .addTo(map)
      .bindPopup(`<b>${church.nombre}</b><br>${church.direccion}`);
  });
});
</script>
