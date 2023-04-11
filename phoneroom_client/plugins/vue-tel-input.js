import { defineNuxtPlugin } from '#app'
import {VueTelInput} from "vue-tel-input";

export default defineNuxtPlugin((nuxtApp) => {
    nuxtApp.vueApp.component('vue-tel-input', VueTelInput)
})
