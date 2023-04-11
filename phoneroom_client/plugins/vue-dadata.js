import { defineNuxtPlugin } from '#app'
import { VueDadata } from 'vue-dadata';

export default defineNuxtPlugin((nuxtApp) => {
    nuxtApp.vueApp.component('vue-dadata', VueDadata)
})
