<x-app-layout>
  <section class body_travels>
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
        <select id="vignoble" name="vignoble"> <!-- mettre les valeur select avec la base de donnée-->

          <option value="" selected>Vignoble</option>
          @foreach ($vinecats as $vinecat)
            <option value="{{ $vinecat->name}}" @selected($vignoble == "{{ $vinecat->name}}")> {{ $vinecat->name}}</option>
          @endforeach
        </select>
        <select id="duree" name="duree">
          <option value="" >Quelle durée</option>
          <option value="0.5" @selected($duree == "0.5")>Demi-journée</option>
          <option value="1" @selected($duree == "1")>1 jour</option>
          <option value="2" @selected($duree == "2")>2 jour / 1 nuit</option>
          <option value="3" @selected($duree == "3")>3 jours / 2 nuits</option>
        </select>
        <select id="pour-qui" name="pour-qui">
          <option value="" selected>Pour qui</option>
          <option value="couple" @selected($pour_qui == 'couple')>Couple</option>
          <option value="famille" @selected($pour_qui == 'famille')>Famille</option>
          <option value="Amis" @selected($pour_qui == 'Amis')>Amis</option>
        </select>
        <select id="envie" name="envie">
          <option value="" selected>Envie</option>
          
          <option value="bien-etre" @selected($envie == "bien-etre")>Bien-être</option>
          <option value="gastronomie" @selected($envie == "gastronomie")>Gastronomie</option>
          <option value="culture" @selected($envie == "culture")>Culture</option>
          <option value="Golf" @selected($envie == "Golf")>Golf</option>
          <option value="Bio" @selected($envie == "Bio")>Bio</option>
          <option value="Insolite" @selected($envie == "Insolite")>Insolite</option>
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
            
            <img id="image" src="{{ $sejour->ressources[0]->get_url() }}"> </img>
            <p id="title">{{ mb_substr($sejour->title,0,50,'UTF-8') }}</p>                                        
            <p id="vignoble">{{ mb_substr($sejour->vineyard_category->name,0,50,'UTF-8') }} @if( $sejour->rating != '') {{ $sejour->rating }} étoiles @endif</p>
            <p id="description">{{ mb_substr($sejour->description,0,50,'UTF-8') }}</p>
            <p id="jours">{{ $sejour->days }} @if( $sejour->days >1)jours 
              @else 
              jour
              @endif
            </p>
            <p id="price">{{ $sejour->price_per_person }} € par personne</p>
            <a href="afficher\{{ $sejour->id }}"><button> Decouvrir l'offre</button></a>
        </div>
      @endforeach
    @endif
   
  </section>


    @vite(['resources/js/app.js'])
  </section>
</x-app-layout>