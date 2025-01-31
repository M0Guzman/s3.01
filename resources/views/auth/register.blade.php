<x-app-layout>
 <div class=" flex flex-col sm:justify-center items-center sm:pt-0 bg-gray-100 dark:bg-gray-900">
<div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
    
    <div id="SectionHelp">
        <div id="closeButton"><i class="fa-solid fa-circle-xmark"></i></div>
        <p>
            L'inscription est obligatoire pour la réservation d'un séjour<br><br>

            La date de naissance permet de calculer votre age,<br>
            si vous avez moins de 18 ans certaines restrictions s'appliquerons<br><br>

            Votre numéro de téléphone et votre email doivent être valide.<br>
            Ceux-ci seront ammenez à être confirmer.<br><br>

            <strong>Mot de passe</strong> : <i class="fa-solid fa-triangle-exclamation"></i> il doit respecter les critères suivants<br>
            Compris entre <strong>8 et 50 caractères</strong><br>
            Doit contenir au moins <strong>une lettre MAJUSCULE ou minuscule</strong><br>
            Doit contenir au moins <strong>un caractère spécial</strong><br>
            Doit contenir au moins <strong>un chiffre</strong><br><br>

            Exemple : Ceci&1Mot2Passe<br><br>


            En cas d'erreur de saisie un message apparait pour vous avertir.<br><br>

            Pour en savoir plus sur l'usage de vos donnée et comment exercer vos droit,<br>
            veuillez vous référez à notre <a class="astyle" href="{{ route('policies.privacy') }}">politique de confidentialité.</a>
            
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="flex flex-row gap-2 mb-4">
            <!-- First Name -->
            <div class="w-full mr-3">
                <x-input-label for="first_name" :value="__('Prenom')" />
                <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <!-- Last Name -->
            <div class="w-full ml-3">
                <x-input-label for="last_name" :value="__('Nom')" />
                <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>
        </div>

        <!-- Gender -->
        <div>
            <x-input-label for="gender" :value="__('Genre')" />
            <x-select id="gender" class="block mt-1 w-full" name="gender" :value="old('gender')" required autofocus autocomplete="gender" list="genderlist">
                <option>Male</option>
                <option>Female</option>
                <option>Non-Binary</option>
                <option>Other</option>
            </x-select>
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

         <!-- Birth date -->
        <div class="mt-4">
            <x-input-label for="birth_date" :value="__('Date de naissance')" />
            <x-text-input id="birth_date" class="block mt-1 w-full" type="date" name="birth_date" :value="old('birth_date')" required autocomplete="birth_date" />
            <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Numéro de téléphone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone')" required autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mot de passe')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a id="helpButton" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                <i class="fa-regular fa-circle-question"></i>Besoin d'aide
            </a>
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Vous posséder déjà un compte?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Créer un compte') }}
            </x-primary-button>
        </div>
    </form>
    </div>
    </div>

    <style>


        #SectionHelp {
            position:fixed;
            top:25px;
            left:28vw;
            display: none;
            flex-direction: column;
            gap: 20px;
            background-color: #d1d2d3;
            padding: 15px;
            border: 2px solid #2c0015;
            border-radius: 20px;
            z-index: 10;

        }

        #closeButton {
            position: absolute;
            right: 15px;
            font-size: 30px; 
            cursor: pointer;  
            z-index: 15;
        }

        #SectionHelp p {
            margin-right: 20px;
            font-size: 16px
        }

        #SectionHelp a {
            font-size: 16px;
            color: blue;         
            text-decoration: none;
        }

        #helpButton {
            margin-right: 20px;
            cursor: pointer;
        }

    </style>

    <script>
        const help = document.getElementById("helpButton")
        const SectionHelp = document.getElementById("SectionHelp")
        const ButtonClose = document.getElementById("closeButton")
        help.addEventListener('click',function() {
            SectionHelp.style.display = "flex";
        })
        ButtonClose.addEventListener('click',function() {
            SectionHelp.style.display = "none";
        })
    </script>
</x-app-layout>
