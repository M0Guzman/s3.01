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
                'resources/scss/app.scss',
                'resources/js/app.js',
                'resources/scss/app.scss',
                'resources/images/logo.png'
            ],
            refresh: true,
        }),
    ],
});
