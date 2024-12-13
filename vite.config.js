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
                'resources/scss/modife.scss',
                'resources/images/delete.png',
                'resources/images/logo.png',
                'resources/images/paypal.svg',
                'resources/images/stripe.svg',
                'resources/images/visa.svg',
                'resources/scss/wine_road.scss',
                'resources/scss/order_history.scss',
                'resources/images/vrdv.jpg',
                'resources/images/trdv.jpg',
                'resources/images/rdv.jpg'
            ],
            refresh: true,
        }),
    ],
});
