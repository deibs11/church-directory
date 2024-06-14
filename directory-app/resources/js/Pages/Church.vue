<template>
    <div class="church-details">
        <h1>{{ church.nombre }}</h1>
        <p><strong>Estado:</strong> {{ church.estado }}</p>
        <p><strong>País:</strong> {{ church.pais }}</p>
        <p><strong>Descripcion:</strong>{{ church.descripcion }}</p>
        <!-- Otros detalles de la iglesia según tus necesidades -->
    </div>
</template>

<script>
export default {
    props: {
        church: Object, // Declarar la prop 'church' que se espera recibir del controlador
    },
};
</script>

<style scoped>
.church-details {
    /* Estilos opcionales para la visualización de detalles de la iglesia */
}
</style>
