// resources/js/router.js

import { createRouter, createWebHistory } from 'vue-router';
import Directorio from './Pages/Directorio.vue';
import Church from './Pages/Church.vue';

const routes = [
    {
        path: '/directorio',
        name: 'Directorio',
        component: Directorio
    },
    {
        path: '/directorio/iglesia/:id',
        name: 'church',
        component: Church,
        props: true
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
