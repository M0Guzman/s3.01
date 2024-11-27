<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Ajouter une Nouvelle Adresse') }}
        </h2>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="addressname" >Nom de l'adresse :</x-input-label>
            <x-text-input id="addressname" name="addressname" type="text" class="mt-1 block w-full" required autofocus />
        </div>

        <div>
            <x-input-label for="numero" >Rue :</x-input-label>
            <x-text-input id="numero" name="numero" type="text" class="mt-1 block w-full" required autofocus />
        </div>

        <div class="mt-1 flex">
            <div>
                <x-input-label for="code" >Code postal :</x-input-label>
                <x-text-input id="code" name="code" type="text" class="w-1/2 pr-2" required autofocus />
            </div>

            <div >
                <x-input-label for="ville" >Ville :</x-input-label>
                <x-text-input id="ville" name="ville" type="text" class="w-1/2 pr-2" required autofocus />
            </div>
        </div> 

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
