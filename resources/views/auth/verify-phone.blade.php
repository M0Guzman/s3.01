<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Thanks for signing up! Before getting started, could you verify your phone number by entering the code we just sent you via SMS?') }}
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
                    {{ __('Verify') }}
                </x-primary-button>

                <x-secondary-button type='submit' name='action' value='resend'>
                    {{ __('Resend code') }}
                </x-secondary-button>
            </form>

            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
