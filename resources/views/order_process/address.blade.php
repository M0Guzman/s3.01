<x-app-layout>
    @vite(['resources/js/process_order.js'])
    <main class="body">
        <div class="commande-container">
            <h1 class="commande-title">SELECTIONNER UNE ADDRESSE DE FACTURATION</h1>
            <nav class="commande-nav">
                <ul>
                    <li>Panier</li>
                    <li>Identifiez-vous</li>
                    <li class="active">Adresse</li>
                    <li>CGV / CPV</li>
                    <li>Confirmation</li>
                </ul>
            </nav>

            <div class=" flex flex-col sm:justify-center items-center sm:pt-0 bg-gray-100 dark:bg-gray-900">
                <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                    <form method="POST" action="{{ route('order.process.address') }}">
                        @csrf

                        <div class="w-full mr-3 mb-4">
                            <x-input-label for="address" :value="__('Addresse')" />
                            <x-select id="address" class="block mt-1 w-full" name="address" :value="old('address')" autofocus autocomplete="address" list="addresslist">
                                <option selected value="">Selectionner une addresse</<option>

                                @foreach (Auth::user()->addresses as $address)
                                    <option value="{{ $address->id }}">{{ $address->name }}</option>
                                @endforeach
                            </x-select>
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>

                        <div id="add_address">
                            <div class="mt-4 mb-6">Ou <br> Créer une nouvelle addresse</div>

                            <div class="w-full mr-3 mb-4">
                                <x-input-label for="address_name" value="Nom de l'addresse" />
            <x-text-input id="address_name" class="block mt-1 w-full" type="text" name="address_name" autofocus autocomplete="address_name" />
            <x-input-error :messages="$errors->get('address_name')" class="mt-2" />
        </div>

        <div class="w-full mr-3 mb-4">
            <x-input-label for="address_street" value="Rue" />
            <x-text-input id="address_street" class="block mt-1 w-full" type="text" name="address_street" autofocus autocomplete="address_street" />
            <x-input-error :messages="$errors->get('address_street')" class="mt-2" />
        </div>

        <div class="w-full mr-3 mb-4">
            <x-input-label for="address_phone" value="Numéro de téléphone" />
            <x-text-input id="address_phone" class="block mt-1 w-full" type="text" name="address_phone" autofocus autocomplete="address_phone" />
            <x-input-error :messages="$errors->get('address_phone')" class="mt-2" />
        </div>

        <div class="w-full mr-3 mb-4">
            <x-input-label for="address_city" value="Ville" />
            <x-text-input id="address_street" class="block mt-1 w-full" type="text" name="address_city" autofocus autocomplete="address_city" />
            <x-input-error :messages="$errors->get('address_city')" class="mt-2" />
        </div>


        <div class="w-full flex flex-row gap-2 mb-4 mt-4 justify-between">
            <div>
                <x-input-label for="address_zip" value="Code Postale" />
                <x-text-input id="address_zip" class="block mt-1 w-full" type="text" name="address_zip" autofocus autocomplete="address_zip" />
                <x-input-error :messages="$errors->get('address_zip')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="address" value="Département" />
            <x-select id="address_department" class="block mt-1 w-full" name="address_department" autofocus autocomplete="address_department" list="addressdepartmentlist">
                <option selected>Selectionner une département</<option>

                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </x-select>
            <x-input-error :messages="$errors->get('address_department')" class="mt-2" />
        </div>

        </div>
        </div>

        <x-primary-button class="">
            Suivant
            </x-primary-button>
        </div>
    </main>
</x-app-layout>
