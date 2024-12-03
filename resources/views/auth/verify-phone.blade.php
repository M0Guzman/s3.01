<x-app-layout>
 <div class="flex flex-col sm:justify-center items-center sm:pt-0 bg-gray-100 dark:bg-gray-900">
<div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Un code de vérification vous a été envoyer par SMS, merci de le renseigner ci-dessous pour terminer votre inscription.') }}
    </div>

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('mobile.process') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="token" :value="__('Code')" />
                <x-text-input id="token" class="block mt-1 w-full" type="text" name="token" autofocus />
                <x-input-error :messages="$errors->get('token')" class="mt-2" />
            </div>

            <div class="mt-3">
                <x-primary-button name='action' value='verify'>
                    {{ __('Verifier') }}
                </x-primary-button>

                <x-secondary-button type='submit' name='action' value='resend'>
                    {{ __('Renvoyer un code') }}
                </x-secondary-button>
            </form>

            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Se déconnecter') }}
            </button>
        </form>
    </div>
    </div>
    </div>
</x-app-layout>
