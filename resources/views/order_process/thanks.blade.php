<x-app-layout>
    @vite(['resources/scss/panier.scss', 'resources/js/process_order.js'])
    <main class="body">
        <div class="commande-container">
            <h1 class="commande-title">MERCI POUR VOTRE ACHAT</h1>
                <div class=" flex flex-col sm:justify-center items-center sm:pt-0 bg-gray-100 dark:bg-gray-900">
                    <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                        <div class="text-lg mb-4">Le récapitulatif de votre commande vous a été envoyer par mail</div>
                    </div>
                </div>
        </div>
    </main>

</x-app-layout>
