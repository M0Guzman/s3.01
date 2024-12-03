<x-app-layout>
 <div class="flex flex-col sm:justify-center items-center sm:pt-0 bg-gray-100 dark:bg-gray-900">
<div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Merci d avoir créer un compte! Un mail de confirmation vous a été envoyer, si vous ne l avez pas reçu, vous pouvez en redemandez un autre.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('Un nouveau lien de vérification a été envoyer a votre addresse email.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Renvoyer un email de confirmation') }}
                </x-primary-button>
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
