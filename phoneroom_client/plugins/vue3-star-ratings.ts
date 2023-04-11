import { defineNuxtPlugin } from '#app'

import vue3starRatings from "vue3-star-ratings";

export default defineNuxtPlugin((nuxtApp) => {
    nuxtApp.vueApp.component('vue3-star-ratings', vue3starRatings)
})


