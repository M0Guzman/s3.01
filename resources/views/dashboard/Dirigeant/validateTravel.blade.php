<x-dashboard-layout>
@vite(['resources/scss/dashboard/dirigeant/dirigeant.scss'])

<div id="navigation">
    <a href="{{ route('dashboard.dirigeant.create.Travel') }}">Creation de Sejour</a>
    <a  href="{{ route('dashboard.dirigeant.validate.Travel') }}">Validation de Sejour</a>
</div>

<div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
  <h1 class="text-2xl font-bold mb-4">Validation de Sejour</h1>
</div>
<div>
  <form action="{{route('dashboard.dirigeant.actualiserTravel')}}" method="POST">
  @csrf
  <table>
    <th class="border border-gray-300 px-4 py-2 text-gray-700 font-semibold">Nom du Séjour</th>
    <th class="border border-gray-300 px-4 py-2 text-gray-700 font-semibold">Description</th>
    <th class="border border-gray-300 px-4 py-2 text-gray-700 font-semibold">Destination</th>
    <th class="border border-gray-300 px-4 py-2 text-gray-700 font-semibold">Departement</th>
    <th class="border border-gray-300 px-4 py-2 text-gray-700 font-semibold">Durée</th>
    <th class="border border-gray-300 px-4 py-2 text-gray-700 font-semibold">Pour qui</th>
    <th class="border border-gray-300 px-4 py-2 text-gray-700 font-semibold">Envie</th>
    <th class="border border-gray-300 px-4 py-2 text-gray-700 font-semibold">Activity</th>
    <th class="border border-gray-300 px-4 py-2 text-gray-700 font-semibold">Partner</th>
    <th class="border border-gray-300 px-4 py-2 text-gray-700 font-semibold">Etat</th>    
    <th class="border border-gray-300 px-4 py-2 text-gray-700 font-semibold">Prix</th>
    <th class="border border-gray-300 px-4 py-2 text-gray-700 font-semibold">Valide</th>
    <th class="border border-gray-300 px-4 py-2 text-gray-700 font-semibold">Refuse</th>
    @foreach ($travels as $travel)
    @if($travel->state_travel == "aValide")
      @php
        $vineyard_category = $travel->vineyard_category_id;
        
        foreach($vineyardCategory as $vineyard_category1)
          if($vineyard_category == $vineyard_category1->id)
          $vineyard_categoryName =$vineyard_category1->name;

        $pour_qui = $travel->participant_category_id;

        foreach($participant_categories as $participant_categorie)
          if($pour_qui == $participant_categorie->id)
          $participant_categorieName =$participant_categorie->name;

        $envie = $travel->travel_category_id;
        
        foreach($travelCategory as $travelCategory1)
          if($envie == $travelCategory1->id)
            $travelCategoryName =$travelCategory1->name;
      @endphp
      <tr>
        
        <td>{{ $travel->title }}</td>
        <td>{{ $travel->description }}</td>
        <td>{{ $vineyard_categoryName }}</td>
        <td>{{ $travel->Departement }}</td>
        <td>{{ $travel->days }} jours</td>
        <td>{{ $participant_categorieName }}</td>
        <td>{{ $travelCategoryName }}</td>
        <td>{{ $travel->activity }}</td> 
        <td>{{ $travel->partner }}</td>
        <td>{{ $travel->state_travel }}</td>
        <td>{{ $travel->price_per_person }} €</td>
        <td><input type="radio" name="{{$travel->id}}" value="valider" id="valider"></td>
        <td><input type="radio" name="{{$travel->id}}" value="refuser" id="refuser"></td>
      </tr>
    @endif
  @endforeach
  
  </table>
  <div class="mt-4">
    <button 
      type="submit" 
      class="bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600">
      Enregistrer
    </button>
    </form>
  </div>
</div>

</x-dashboard-layout>