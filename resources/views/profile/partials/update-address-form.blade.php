<section >
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Vos Adresses') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Visualiser et/ou Modifier vos adresse(s).") }}
        </p>
    </header>

    
    @if (session('status') === 'Address-deleted')
        <p
            x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 2000)"
            class="text-sm text-gray-600 dark:text-gray-400"
        >{{ __('Adresse supprimé.') }}</p>
    @endif
    
    
    <div class="segment formConteneur">
        @foreach ($userAddresses as $OneUserAddress)
            <div style="width: 350px; margin:1em;">
                <form method="post" action="{{ route('address.edit') }}" class="sous-section">
                    @csrf
                    @method('patch')
                    <input type="hidden" id="address_id" name="address_id" value="{{ $OneUserAddress->address->id }}"></input>
                    <div class="content" style="margin: 10px 0;">
                        <x-text-input style="width: 300px;" id="addressname" name="addressname" type="text" value="{{ $OneUserAddress->address->name }}" required/>
                    </div>

                    <div class="content" style="margin: 10px 0;">
                        <x-text-input style="width: 300px;" id="rue" name="rue" type="text" value="{{ $OneUserAddress->address->street }}" required autofocus />
                    </div>

                    <div style="margin: 10px 0; width:300px; ">
                        <x-text-input style="width:300px" id="telephone" name="telephone" type="text" value="{{ $OneUserAddress->address->phone }}" required autofocus/>
                    </div>

                    <div style="width:300px;">
                            <x-text-input style="width:300px" id="ville" name="ville" type="text" value="{{ $OneUserAddress->address->city->name }}" required autofocus/>
                    </div>

                    <div class="conteneur" style="margin: 10px 0;">
                        <div style="width: 75px;">
                            <x-text-input style="width: 75px;" id="cp" name="cp" type="text" value="{{ $OneUserAddress->address->city->department_zip }}" required autofocus/>
                        </div>
                            
                        <div style="margin: 0 0 0 10px; width:215px;">
                        <select style="width: 215px;" id="department" name="department" required autofocus>
                            <option>Sélectionnez un département</option>
                            @foreach($departments as $unDepartment)
                                <option
                                    @if($OneUserAddress->address->city->department->id == $unDepartment->id) selected @endif>
                                    {{ $unDepartment->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                        
                    </div>

                    

                    <div>
                        <x-primary-button style="margin: 0 0 0 10px;width:300px; height:50px;justify-content:center;margin: 0 10px 0 0">Modifier</x-primary-button>

                        @if (session('status') === 'Address-updated')
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
                <form  method="post" action="{{ route('address.destroy') }}" class="sous-section">
                    @csrf
                    @method('delete')
                    <input type="hidden" id="address_id" name="address_id" value="{{ $OneUserAddress->address_id }}"></input>
                    <x-primary-button  id="remove_button" name="remove_button" class="content" style="width:300px;height:50px;justify-content:center;">Supprimer l'adresse</x-primary-button>
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
