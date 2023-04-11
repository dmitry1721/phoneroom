import { defineNuxtPlugin } from '#app'
import breadcrumbs from 'vue-3-breadcrumbs'

export default defineNuxtPlugin((nuxtApp) => {
    const app = nuxtApp.vueApp.use(breadcrumbs, {
        includeComponent: true, // same as for vue
    })

    // without this return, you won't be able to access $breadcrumbs from useNuxtApp directly,
    // but this.$breadcrumbs will be available anyway
    return {
        provide: {
            breadcrumbs: app.config.globalProperties.$breadcrumbs
        }
    }
})
