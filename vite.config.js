import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    css: {
        preprocessorOptions: {
          scss: {
            additionalData: `@use "resources/scss/global.scss" as *;`,
          },
        },
      },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/scss/app.scss',
                'resources/scss/travel.scss',
                'resources/images/logo.png'
            ],
            refresh: true,
        }),
    ],
});
