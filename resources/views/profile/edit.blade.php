<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mon compte') }}
        </h2>
    </x-slot>
    <!--Permettre que si tu es dirigeant -->
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
  <h1 class="text-2xl font-bold mb-4">Création de Séjour</h1>
  
  <form action="#" method="POST">
    <table class="table-auto border-collapse border border-gray-300 w-full text-left">
      <thead class="bg-gray-100">
        <tr>
          <th class="border border-gray-300 px-4 py-2 text-gray-700 font-semibold">Nom du Séjour</th>
          <th class="border border-gray-300 px-4 py-2 text-gray-700 font-semibold">Destination</th>
          <th class="border border-gray-300 px-4 py-2 text-gray-700 font-semibold">Durée</th>
          <th class="border border-gray-300 px-4 py-2 text-gray-700 font-semibold">Pour qui</th>
          <th class="border border-gray-300 px-4 py-2 text-gray-700 font-semibold">Envie</th>
        </tr>
      </thead>
      <tbody>
        <tr class="hover:bg-gray-50">
          <td class="border border-gray-300 px-4 py-2">
            <input 
              type="text" 
              name="nom_sejour[]" 
              placeholder="Nom du Séjour" 
              class="w-full px-2 py-1 border rounded focus:outline-none focus:ring focus:ring-blue-300">
          </td>
          <td class="border border-gray-300 px-4 py-2">
            <select 
              name="vignoble[]" 
              class="w-full px-2 py-1 border rounded focus:outline-none focus:ring focus:ring-blue-300">
              <option value="">Choisir</option>
              <option value="Vallée du Rhône">Vallée du Rhône</option>
              <option value="Alsace">Alsace</option>
              <option value="Beaujolais">Beaujolais</option>
              <option value="Bordeaux">Bordeaux</option>
              <option value="Bourgogne">Bourgogne</option>
              <option value="Catalogne">Catalogne</option>
              <option value="Champagne">Champagne</option>
              <option value="Jura">Jura</option>
              <option value="Languedoc-Roussillon">Languedoc-Roussillon</option>
              <option value="Paris">Paris</option>
              <option value="Provence">Provence</option>
              <option value="Savoie">Savoie</option>
              <option value="Sud-Ouest">Sud-Ouest</option>
              <option value="Val de Loire">Val de Loire</option>
            </td>
            <td class="border border-gray-300 px-4 py-2">
            <select 
              name="pour_durée[]" 
              class="w-full px-2 py-1 border rounded focus:outline-none focus:ring focus:ring-blue-300">
              <option value="">Choisir</option>
              <option value="1">1 jour</option>
              <option value="2">2 jours</option>
              <option value="3">3 jours</option>
              <option value="0.5">1/2 journée</option>
            </select>
          </td>
          <td class="border border-gray-300 px-4 py-2">
            <select 
              name="pour_qui[]" 
              class="w-full px-2 py-1 border rounded focus:outline-none focus:ring focus:ring-blue-300">
              <option value="">Choisir</option>
              <option value="Famille">Famille</option>
              <option value="Amis">Amis</option>
              <option value="Solo">Couple</option>
            </select>
          </td>
          <td class="border border-gray-300 px-4 py-2">
            <select 
              name="envie[]" 
              class="w-full px-2 py-1 border rounded focus:outline-none focus:ring focus:ring-blue-300">
              <option value="">Choisir</option>
              <option value="bien_etre">Bien-être</option>
              <option value="gastronomie">Gastronomie</option>
              <option value="golf">Golf</option>
              <option value="culture">Culture</option>
              <option value="bio">Bio</option>
              <option value="insolite">Insolite</option>
            </select>
          </td>
        </tr>
      </tbody>
    </table>

    <div class="mt-4">
      <button 
        type="submit" 
        class="bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600">
        Enregistrer
      </button>
    </div>
  </form>
</div>


    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div>
                    @include('profile.partials.update-address-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div>
                    @include('profile.partials.add-address-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
<!--
@if($user->id == 1){


    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div>
                    @include('profile.partials.update-address-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div>
                    @include('profile.partials.add-address-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
}
@endif-->
</x-app-layout>
