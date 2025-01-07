<x-dashboard-layout>
@vite(['resources/scss/dashboard/dirigeant/dirigeant.scss'])

<div id="navigation">
    <a href="{{ route('dashboard.dirigeant.create.Travel') }}">Creation de Sejour</a>
    <a  href="{{ route('dashboard.dirigeant.validate.Travel') }}">Validation de Sejour</a>
</div>

<div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
  <h1 class="text-2xl font-bold mb-4">Création de Séjour</h1>
  
  <form action="{{route('dashboard.dirigeant.create.Travel')}}" method="POST">
    @csrf
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
              name="nom_sejour" 
              placeholder="Nom du Séjour" 
              class="w-full px-2 py-1 border rounded focus:outline-none focus:ring focus:ring-blue-300">
          </td>
          <td class="border border-gray-300 px-4 py-2">
            <select 
              name="vignoble" 
              class="w-full px-2 py-1 border rounded focus:outline-none focus:ring focus:ring-blue-300">
              <option value="">Choisir</option>
              
              @foreach ($vineyardCategory as $category)
              
              <option value="{{ $category->id }}">{{ $category->name }}</option>

              @endforeach
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
              @foreach ($participant_categories as $category)
              
              <option value="{{ $category->id }}">{{ $category->name }}</option>

              @endforeach
            </select>
          </td>
          <td class="border border-gray-300 px-4 py-2">
            <select 
              name="envie" 
              class="w-full px-2 py-1 border rounded focus:outline-none focus:ring focus:ring-blue-300">
              <option value="">Choisir</option>

              @foreach ($travelCategory as $category)
              
              <option value="{{ $category->id }}">{{ $category->name }}</option>

              @endforeach
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

</x-dashboard-layout>