import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    css: {
        preprocessorOptions:{
            scss: {
                additionalData: `@use "resources/scss/global.scss" as *;`,
            },
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/css/test.css',
                'resources/js/app.js',
                'resources/scss/app.scss',
                'resources/scss/travel.scss',
                'resources/scss/travels.scss',
                'resources/images/logo.png',
                'resources/scss/wine_road.scss',
                'resources/images/vrdv.jpg', 
                'resources/images/trdv.jpg', 
                'resources/images/rdv.jpg'
            ],
            refresh: true,
        }),
    ],
});
