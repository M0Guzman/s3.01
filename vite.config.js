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
                'resources/js/process_order.js',
                'resources/js/app.js',
                'resources/scss/app.scss',
                'resources/scss/travel.scss',
                'resources/scss/travels.scss',
                'resources/scss/panier.scss',
                'resources/images/delete.png',
                'resources/images/logo.png',
                'resources/images/paypal.svg',
                'resources/images/stripe.svg',
                'resources/images/visa.svg'
            ],
            refresh: true,
        }),
    ],
});
