<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Ajouter une nouvelle adresse') }}
        </h2>
    </header>

    @if ($errors->any())
        <div class="errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div style="width: 350px; margin:1em;">
        <form method="post" action="{{ route('address.create') }}" class="sous-section address-form">
            @csrf
            <label style="margin: 10px 0;">Addresse name</label>
            <div class="content">
                <x-text-input style="width: 300px;" id="addressname" name="addressname" type="text"  required/>
            </div>

            <label style="margin: 10px 0;">Rue</label>
            <div class="content">
                <x-text-input style="width: 300px;" id="rue" name="rue" type="text" required autofocus />
            </div>

            <label style="margin: 10px 0;">Numéro de téléphone</label>
            <div>
                <x-text-input style="width:300px" id="telephone" name="telephone" type="text" required autofocus/>
            </div>

            <label style="margin: 10px 0;">Ville</label>
            <div class="autocomplete" style="width:300px;">
                <x-text-input style="width:300px" id="ville" name="ville" type="text" required autofocus/>
            </div>

            <label style="margin: 10px 0;">Code postal</label>
            <label style="margin: 0 0 0 10px;">Departement</label>
            <div class="conteneur">
                <div style="width: 75px;">
                    <x-text-input style="width:75px" id="cp" name="cp" type="text" required readonly/>
                </div>

                <div style="margin: 0 0 0 10px; width:215px;">
                    <select style="width: 215px;" id="department" name="department" required autofocus>
                        <option>Selectionner un département</option>
                        @foreach($departments as $unDepartment)
                            <option value="{{ $unDepartment->id }}">
                                {{ $unDepartment->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

           

            <div class="conteneur" style="margin: 10px 0 0 0;">
                <div>
                    <x-primary-button style="width:300px;justify-content:center;">Ajouter</x-primary-button>

                    @if (session('status') === 'Address_created')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400"
                        >{{ __('Saved.') }}</p>
                    @endif
                </div>
            </div>
        </form>
    </div>
    <script>const api_url = "{{ route('autocomplete.cities') }}"</script>
    @vite(['resources/js/address.js'])
</section>
