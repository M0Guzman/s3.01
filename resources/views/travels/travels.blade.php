<x-app-layout>
  <section class="body_travels">
      <br>
    @vite(['resources/scss/travels.scss'])
    <div class="filters-container" >

      <h1>Séjours Œnologiques</h1>
      <br>
      <p> Personnalisez votre séjour œnologique en
                  fonction de vos envies ! Séjourner au
                  Château dans le Bordelais, réaliser
                  votre propre cuvée en Champagne, découvrir
                  les accords mets & vins en Bourgogne, se
                  relaxer dans un spa au milieu des vignes ou
                  encore survoler la plaine d'Alsace en
                  montgolfière, ...
                  Proposés par thématique – bien-être, gastronomie,
                  culture ou sport – nos week-ends œnologiques
                  sont élaborés pour permettre à tous les publics,
                  de l’amateur au néophyte, de trouver leur bonheur.</p>
      <form class="filters" action="#">
        @csrf
        <select id="vineyard_category" name="vineyard_category">

          <option value="" @selected($vineyard_category == "")>Vignoble</option>
          @foreach ($vineyard_categories as $cat)
            <option value="{{ $cat->name}}" @selected($vineyard_category == $cat->name)> {{ $cat->name}}</option>
          @endforeach
        </select>
        <select id="duree" name="duree">
          <option value="" >Quelle durée</option>
          <option value="0.5" @selected($duree == "0.5")>Demi-journée</option>
          <option value="1" @selected($duree == "1")>1 jour</option>
          <option value="2" @selected($duree == "2")>2 jour / 1 nuit</option>
          <option value="3" @selected($duree == "3")>3 jours / 2 nuits</option>
        </select>
        <select id="participant_category" name="participant_category">
          <option value="" @selected($participant_category == "")>Pour qui</option>

          @foreach ($participant_categories as $cat)
            <option value="{{ $cat->name}}" @selected($participant_category == $cat->name)> {{ $cat->name}}</option>
          @endforeach
        </select>
        <select id="travel_category" name="travel_category">
          <option value="" @selected($travel_category = "")>Envie</option>
          @foreach ($travel_categories as $cat)
            <option value="{{ $cat->name}}" @selected($travel_category == $cat->name)> {{ $cat->name}}</option>
          @endforeach
        </select>
        <input id="submit" type="submit" value="Recherche">
      </form>
    </div>

    <section id="container_travel">

      @if(count($sejours) == 0)
          <p>Aucun séjour ne correspond à vos critères.</p>
      @else

      @foreach ($sejours as $sejour)

        <div class="cadre">
          <h1 class="price">{{ $sejour->price_per_person }} € par personne</h1>
          
          <img class="image" src="{{ $sejour->resources[0]->get_url() }}"> </img>
          
          <div class="container_info_sejour">
            <h1 class="title">{{ mb_substr($sejour->title,0,50,'UTF-8') }}</h1>

            <div class="container_location_star">
              <h2 class="location">
                {{ mb_substr($sejour->vineyard_category->name,0,50,'UTF-8') }}
              </h2>
              
              <p class="star">
                @if( $sejour->reviews_avg_rating != null)
                  @php
                      $note = $sejour->reviews_avg_rating
                  @endphp
                  @for ($i = 0; $i < 5; $i++)
                    @if ($note >= 1)
                      <i class="fa-solid fa-star"></i>
                    @elseif ($note < 0.5)
                      <i class="fa-regular fa-star"></i>
                    @else
                      <i class="fa-regular fa-star-half-stroke"></i>
                    @endif
                    @php
                      $note --
                    @endphp
                  @endfor
                  {{ round($sejour->reviews_avg_rating, 1) }}/5 
                @endif
              </p>

            </div>
            
            <p class="description">{{ mb_substr($sejour->description,0,50,'UTF-8') }}</p>
            
            <p class="jours">{{ $sejour->days }} 
              @if( $sejour->days >1)jours | {{ $sejour->days -1 }} nuit
              @else
                journée
              @endif
            </p>
            
            <button class="discover_Offer_Button" onclick="window.location.href='{{ route('travel.show', ['id' => $sejour->id]) }}'"> Decouvrir l'offre</button></a>
      
          </div>
        </div>
      @endforeach
    @endif
</x-app-layout>
