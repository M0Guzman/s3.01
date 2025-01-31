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
                'resources/js/app.js',
                'resources/js/partner.js',
                'resources/js/help.js',
                'resources/js/address.js',
                'resources/js/process_order.js',
                'resources/js/RechercheCustom.js',
                'resources/js/dashboard/sales/home.js',
                'resources/js/dashboard/sejour.js',
                'resources/js/faq.js',


                'resources/scss/global/header.scss',
                'resources/scss/global/help.scss',
                'resources/scss/profile/facture.scss',
                'resources/scss/profile/address.scss',
                'resources/scss/global/app.scss',
                'resources/scss/travel/detail_travel.scss',
                'resources/scss/travel/all_travel.scss',
                'resources/scss/homePage/avis.scss',
                'resources/scss/homePage/destination.scss',
                'resources/scss/homePage/video.scss',
                'resources/scss/dashboard/dashboard.scss',
                'resources/scss/dashboard/service_vente.scss',
                'resources/scss/dashboard/service_vente/hotel.scss',
                'resources/scss/dashboard/service_vente/sejour.scss',
                'resources/scss/dashboard/service_vente/addpartenaire.scss',
                'resources/scss/travel/partner.scss',
                'resources/scss/profile/panier.scss',
                'resources/scss/travel/modife.scss',
                'resources/scss/profile/order_history.scss',
                'resources/scss/travel/wine_road.scss',
                'resources/scss/dashboard/dirigeant/dirigeant.scss',
                'select2/dist/css/select2.min.css',
                'resources/scss/other/mainHelp.scss',



                'resources/images/paypal.svg',
                'resources/images/stripe.svg',
                'resources/images/visa.svg',

                'resources/images/vrdv.jpg',
                'resources/images/trdv.jpg',
                'resources/images/rdv.jpg',

                'resources/images/delete.png',
                'resources/images/logo.png',
                'resources/images/No_Image_Available.jpg',

                'resources/images/FAQ/creationCompte_1.png',
                'resources/images/FAQ/mdpOublie.png',
                'resources/images/FAQ/mdpEmail.png',
                'resources/images/FAQ/sejourRecherche.png',
                'resources/images/FAQ/editTravel.png',
                'resources/images/FAQ/editNbPersonne.png',
                'resources/images/FAQ/identifiez_vous.png',
                'resources/images/FAQ/monCompte.png',
                'resources/images/FAQ/addresse.png',
                'resources/images/FAQ/cookies.png',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            jquery: 'jquery/dist/jquery.js'
        },
    },
});
