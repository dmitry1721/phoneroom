import { defineNuxtPlugin } from '#app'
import { createVuetify, ThemeDefinition  } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import {LazyHydrationWrapper} from "vue3-lazy-hydration";

export default defineNuxtPlugin(nuxtApp => {

    const myCustomLightTheme: ThemeDefinition = {
        dark: false,
        colors: {
            background: '#FFFFFF',
            surface: '#FFFFFF',
            primary: '#6200EE',
            'primary-darken-1': '#3700B3',
            secondary: '#03DAC6',
            'secondary-darken-1': '#018786',
            error: '#B00020',
            info: '#2196F3',
            success: '#4CAF50',
            warning: '#FB8C00',
        }
    }

    const vuetify = createVuetify({
        ssr: true,
        components,
        directives,

        theme: {
            defaultTheme: 'myCustomLightTheme',
            themes: {
                myCustomLightTheme,
            }
        },
    })

    nuxtApp.vueApp.use(vuetify)
})