<template>
    <div v-if="canLogin" class="menu-container">
      <Link :href="route('Inicio')" class="menu-link">
        Inicio
      </Link>
      <Link :href="route('churches.map')" class="menu-link">
        Mapa
      </Link>
      <Link :href="route('Directorio')" class="menu-link">
        Directorio
      </Link>
      <Link v-if="canLogin" :href="route('login')" class="menu-link">
        Login
      </Link>
    </div>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3';
  import { defineProps } from 'vue';
  
  // Definir las propiedades que se van a recibir desde las vistas
  defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    churches: Array,  // Añadido para recibir la lista de iglesias
  });
  </script>
  
  <style scoped>
  .menu-container {
    position: sticky;
    top: 0;
    right: 0;
    padding: 1.5rem;
    text-align: end;
    z-index: 10;
    background-color: #ffffff; /* Fondo blanco para asegurarse de que el menú sea visible */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra ligera para destacar el menú */
  }
  
  .menu-link {
    margin-left: 1rem;
    font-weight: 600;
    color: #4a5568; /* Gris medio */
    text-decoration: none;
    transition: color 0.3s ease; /* Suaviza la transición de color */
  }
  
  .menu-link:hover {
    color: #1a202c; /* Gris oscuro al hacer hover */
  }
  
  .menu-link:focus {
    outline: 2px solid #f56565; /* Borde rojo en enfoque */
    border-radius: 0.25rem;
  }
  
  .dark .menu-link {
    color: #a0aec0; /* Gris claro para temas oscuros */
  }
  
  .dark .menu-link:hover {
    color: #ffffff; /* Blanco al hacer hover en temas oscuros */
  }
  </style>
  