import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    css : {
        preprocessorOptions:{
            scss: {
                additionalData: '@use "resources/scss/global.scss" as *;',
            },
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/images/logo.png',
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/scss/app.scss'
            ],
            refresh: true,
        }),
    ],
});
