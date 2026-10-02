import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    resolve: {
        alias: {
            'media-library-pro-vue3-attachment': '/vendor/spatie/laravel-medialibrary-pro/resources/js/media-library-pro-vue3-attachment',
            'media-library-pro-vue3-collection': '/vendor/spatie/laravel-medialibrary-pro/resources/js/media-library-pro-vue3-collection',
            vue: 'vue/dist/vue.esm-bundler.js',
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/css/app-custom.css', 'resources/js/app.js'],
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
});
