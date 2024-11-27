<section >
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Vos Adresses') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Visualiser et/ou Modifier vos adresse(s).") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    
        @csrf
        @method('patch')

        @php
            $adresses = [
                [
                "name" => "Perso",
                "numero" => "1 rue de l'arc-en-ciel",
                "code" => "74000",
                "ville" => "Annecy"
                ],
                [
                "name" => "Private",
                "numero" => "7 rue de l'arc-en-ciel",
                "code" => "74000",
                "ville" => "Annecy"
                ],
                [
                "name" => "Ancienne adresse",
                "numero" => "124 route des alpes",
                "code" => "73100",
                "ville" => "Aix les bains"
                ]
                ]

        @endphp
        
        <div class="segment formConteneur">
            @foreach ($adresses as $adresse)  
                <div style="width: 350px; margin:1em;">
                    <form method="post" action="{{ route('profile.update') }}" class="sous-section">

                        <input type="hidden" name="adresse_id" value="{{ adresse->address_id }}"></input>
                        <div class="content" style="margin: 10px 0;">
                            <x-text-input style="width: 300px;" id="addressname" name="addressname" type="text" value="{{ $adresse['name'] }}" required/>
                        </div>

                        <div class="content" style="margin: 10px 0;">
                            <x-text-input style="width: 300px;" id="numero" name="numero" type="text" value="{{ $adresse['numero'] }}" required autofocus />
                        </div>

                        <div style="margin: 0 0 0 10px; width:215px;">
                            <x-text-input style="width:215px" id="telephone" name="telephone" type="text" value="{{ $adresse['ville'] }}" required autofocus/>
                        </div>

                        <div style="margin: 0 0 0 10px; width:215px;">
                                <x-text-input style="width:215px" id="ville" name="ville" type="text" value="{{ $useradress->address->ville->name }}" required autofocus/>
                        </div>

                        <div class="conteneur" style="margin: 10px 0;">
                            <div style="width: 75px;">
                                <x-text-input style="width: 75px;" id="cp" name="code" type="text" value="{{ $adresse['code'] }}" required autofocus/>
                            </div>
                                
                            <div style="margin: 0 0 0 10px; width:215px;">
                                <x-text-input style="width:215px" id="departement" name="departement" type="text" value="{{ $useradress->address->ville->name }}" required autofocus/>
                            </div>
                        </div>

                        <x-primary-button class="content" style="margin: 10px 0; height:40px; justify-content: center;">Supprimer l'adresse</x-primary-button>     
                        
                        <div class="flex items-center gap-4">
                            <x-primary-button>Save</x-primary-button>

                            @if (session('status') === 'password-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600 dark:text-gray-400"
                                >{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            @endforeach
        </div>  


    <x-modal name="confirm-save-address" focusable>
        <form method="post"  class="p-6">
            @csrf

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Les adresses ont été modifié avec succes') }}
            </h2>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Ok') }}
                </x-secondary-button>
            </div>
        </form>
    </x-modal>
</section>
