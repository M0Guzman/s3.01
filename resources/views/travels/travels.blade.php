<x-app-layout>
  <section class="body_travels">
      <br>

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

    <section class="sejour">

      @if(count($sejours) == 0)
          <p>Aucun séjour ne correspond à vos critères.</p>
      @else

      @foreach ($sejours as $sejour)

        <div id="num1">
            <br>

            <img id="image" src="{{ $sejour->resources[0]->get_url() }}"> </img>
            <p id="title">{{ mb_substr($sejour->title,0,50,'UTF-8') }}</p>
            <p id="vignoble">{{ mb_substr($sejour->vineyard_category->name,0,50,'UTF-8') }} @if( $sejour->reviews_avg_rating != null) {{ $sejour->reviews_avg_rating }} étoiles @endif</p>
            <p id="description">{{ mb_substr($sejour->description,0,50,'UTF-8') }}</p>
            <p id="jours">{{ $sejour->days }} @if( $sejour->days >1)jours
              @else
              jour
              @endif
            </p>
            <p id="price">{{ $sejour->price_per_person }} € par personne</p>
            <a href="{{ route('travel.show', ['id' => $sejour->id]) }}"><button> Decouvrir l'offre</button></a>
        </div>
      @endforeach
    @endif

  </section>
    @vite(['resources/js/app.js'])
  </section>
</x-app-layout>
