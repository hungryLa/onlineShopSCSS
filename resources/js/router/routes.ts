import ClientLayout from "../pages/ClientLayout.vue";
import type {RouteRecordRaw} from "vue-router";
import {pathKeys} from "@/lib/routes";

export const routes: RouteRecordRaw[]= [
    {
        path: '/',
        component: ClientLayout,
        children: [
            {
                path: '/',
                component: async () => import('../pages/MainPage.vue')
            },
            {
                path: pathKeys.client.products.getById(),
                component: async () => import('../pages/MainPage.vue')
            }
        ]
    },
]
