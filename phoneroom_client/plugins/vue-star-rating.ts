// import VueStarRating from 'vue-star-rating';
// import {defineNuxtPlugin} from "#app";
// @ts-ignore
// import { defineNuxtPlugin } from '#app'
import StarRating from "vue-star-rating";

export default defineNuxtPlugin((nuxtApp) => {
    nuxtApp.vueApp.component('star-rating', StarRating);
})
