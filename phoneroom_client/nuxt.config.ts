// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
    css: [
        'vue-dadata/dist/style.css',
        'vuetify/lib/styles/main.sass',
        '@fortawesome/fontawesome-svg-core/styles.css',
        'vue-tel-input/dist/vue-tel-input.css',
        '@vueform/slider/themes/default.css',
        '~/assets/css/style.css',
    ],
    build: {
        transpile: [
            '@fortawesome/fontawesome-svg-core',
            '@fortawesome/free-brands-svg-icons',
            '@fortawesome/free-regular-svg-icons',
            '@fortawesome/free-solid-svg-icons',
            '@fortawesome/vue-fontawesome',
            'vuetify',
        ]
    },
    modules: [
        'nuxt-swiper',
        'nuxt-lazy-hydrate',
        '@pinia/nuxt',
        '@nuxt/image-edge',
        // '@nuxtjs/recaptcha',
        'nuxt-meilisearch',
    ],
    meilisearch: {
        hostUrl: process.env.SEARCH_HOST || 'http://host.docker.internal:7700/',
        // hostUrl: process.env.SEARCH_HOST || 'http://172.17.0.1:7700/',
        searchApiKey: process.env.SEARCH_API_KEY || '',
        adminApiKey: process.env.ADMIN_API_KEY || '',
        serverSideUsage: true,
        // instantSearch: true,
        instantSearch: {
            theme: 'satellite'
        },
        clientOptions: {
            placeholderSearch: true, // default
            paginationTotalHits: 50, // default
            finitePagination: true, // default
            primaryKey: undefined, // default
            keepZeroFacets: false // default
        }
    },
    plugins: [
        '~/plugins/font-awesome.ts',
        '~/plugins/nuxt-lazy-hydrate.ts',
        '~/plugins/breadcrumbs.js',
        '~/plugins/vuetify.ts',
        '~/plugins/vue-dadata.js',
        {src: '~/plugins/vue-tel-input.js', mode: 'client'},
        {src: '~/plugins/vue-star-rating.ts', mode: 'client'},
    ],
    runtimeConfig: {
      public: {
          apiBaseUrl: process.env.NUXT_PUBLIC_API_BASE || 'http://api.phoneroom.local:8000/api/v1/',
          baseUrl: process.env.NUXT_PUBLIC_BASE || 'http://api.phoneroom.local:8000/',
          dadataToken: process.env.NUXT_PUBLIC_DADATA_TOKEN || '1a9315118f4719966d19ac2a29cd821d3db8c9dd',
      },
    },
})

