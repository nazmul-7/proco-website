import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        component: () => import("./pages/home.vue"),
    },
    {
        path: "/test",
        component: () => import("./pages/test.vue"),
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});