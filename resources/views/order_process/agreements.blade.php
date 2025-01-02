<x-app-layout>
    @vite(['resources/js/process_order.js'])
    <main class="body">
        <div class="commande-container">
            <h1 class="commande-title">CONDITIONS DE VENTES</h1>
            <nav class="commande-nav">
                <ul>
                    <li>Panier</li>
                    <li>Identifiez-vous</li>
                    <li>Adresse</li>
                    <li class="active">CGV / CPV</li>
                    <li>Confirmation</li>
                </ul>
            </nav>

                <div class=" flex flex-col sm:justify-center items-center sm:pt-0 bg-gray-100 dark:bg-gray-900">
                    <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                        <form method="POST">
                            @csrf

                            <div class="text-lg mb-4">Conditions générales de ventes</div>
                            <div class="w-full mr-3 mb-4">
                                <input id="agree_cgv" class="mt-1 rounded transition w-4 h-4" type="checkbox" name="agree_cgv" required />
                                <label for="agree_cgv" class="font-medium text-sm text-gray-700 dark:text-gray-300">
                                    J'ai lu les conditions générales de ventes et j'y adhère sans réserve (<a href='#'>Lire les conditions générales de ventes</a>")"
                                </label>
                                <x-input-error :messages="$errors->get('agree_cgv')" class="mt-2" />
                            </div>

                            <div class="text-lg mb-4">Conditions particulières de ventes</div>
                            <div class="w-full mr-3 mb-4">
                                <input id="agree_cpv" class="mt-1 rounded transition w-4 h-4" type="checkbox" name="agree_cpv" required />
                                <label for="agree_cpv" class="font-medium text-sm text-gray-700 dark:text-gray-300">
                                    J'ai lu les conditions particulières de ventes et j'y adhère sans réserve (<a href='#'>Lire les conditions particulières de ventes</a>")"
                                </label>
                                <x-input-error :messages="$errors->get('agree_cpv')" class="mt-2" />
                            </div>

                            <x-primary-button>Suivant</x-primary-button>
                        </form>
                    </div>
                </div>
        </div>
    </main>
</x-app-layout>
