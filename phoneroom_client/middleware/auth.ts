import {useUserStore} from "~/stores/UserStore";

export default defineNuxtRouteMiddleware((to, from) => {
    // isAuthenticated() is an example method verifying if a user is authenticated
    if (!(useUserStore().getUser() && useUserStore().getToken())) {
        return navigateTo('/');
    }
})
