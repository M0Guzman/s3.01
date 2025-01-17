<x-app-layout>
  <section class="body_travels">
      <br>
    @vite(['resources/scss/travel/all_travel.scss'])

    <div id="intro">
      <h1 id="page_title">Séjours Œnologiques</h1>
      <br>
      <h3>
        Personnalisez votre séjour œnologique en
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
        de l’amateur au néophyte, de trouver leur bonheur.
      </h3>
    </div>

    <div class="filter-container">
      <form class="filter"  method="get">
        <select id="vineyard_category" name="vineyard_category">
          <option value="">Quel Vignoble ?</option>
          @foreach ($vineyard_categories as $cat)
            <option value="{{ $cat->id}}" @selected($vineyard_category == $cat->id)> {{ $cat->name}}</option>
          @endforeach
        </select>
        <select id="duree" name="duree">
          <option value="">Quelle durée ?</option>
          <option value="0.5" @selected($duree == 0.5)>Demi-journée</option>
          <option value="1" @selected($duree == 1)>1 jour</option>
          <option value="2" @selected($duree == 2)>2 jour / 1 nuit</option>
          <option value="3" @selected($duree == 3)>3 jours / 2 nuits</option>
        </select>
        <select id="participant_category" name="participant_category">
          <option value="">Pour qui ?</option>

          @foreach ($participant_categories as $cat)
            <option value="{{ $cat->id}}" @selected($participant_category == $cat->id)> {{ $cat->name}}</option>
          @endforeach
        </select>
        <select id="travel_category" name="travel_category">
          <option value="">Une envie spécial ?</option>
          @foreach ($travel_categories as $cat)
            <option value="{{ $cat->id}}" @selected($travel_category == $cat->id)> {{ $cat->name}}</option>
          @endforeach
        </select>
        <button id="submit" type="submit"> <i style="color: white;font-size: 30px" class="fa-solid fa-magnifying-glass"></i></button>
        <button id="help" type="button"> <i style="color: white;font-size: 30px" class="fa-regular fa-circle-question"></i></button>
        
      </form>
  </div>

  <div id="SectionHelp">
  	  <h3>
        Cette page présente l'ensemble des séjours que nous proposons.<br><br>
        Vous pouvez filter les séjours selon quatre critères :<br>
        "Quel vignoble" pour selectionner la région du séjour.<br>
        "Quelle durée" : pour choisir la durée en nombre de jours.<br>
        "Pour qui" : pour trouver un séjour adapté à  votre situation (famille, couple,amis)<br>
        "Une envie spécial" : pour explorer une selection de séjours atypiques.<br><br>

        Si un séjour vous plait, cliquer simplement sur "Découvrir l'offre"
      </h3>
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

            <p class="description">{{ mb_substr($sejour->description,0,300,'UTF-8') }}</p>

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
    </section>

    <div class="flex justify-center p-6">
    <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
        <a href="?page=1" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
          <span class="sr-only">Previous</span>
          <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
            <path fill-rule="evenodd" d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
          </svg>
        </a>

         <a href="?page={{ $current_page > 1 ? $current_page - 1 : $current_page }}" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
          <span class="sr-only">Previous</span>
          <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
            <path fill-rule="evenodd" d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
          </svg>
        </a>



        @if($current_page == 1)
        <a href="?page=2" aria-current="page" class="relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">1</a>
        @else
        <a href="?page={{ $current_page - 1 }}" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">{{ $current_page -1 }}</a>
        <a href="?page={{ $current_page }}" aria-current="page" class="relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">{{ $current_page }}</a>

        @endif

        <a href="?page={{ $current_page + 1 }}" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">{{ $current_page + 1}}</a>

        <a href="?page={{ $current_page + 2 }}" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">{{ $current_page + 2}}</a>


        <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 ring-1 ring-inset ring-gray-300 focus:outline-offset-0">...</span>

        <a href="?page={{ $total_pages - 2 }}" class="relative hidden items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">{{ $total_pages - 2}}</a>
        <a href="?page={{ $total_pages - 1 }}" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">{{ $total_pages - 1}}</a>
        <a href="?page={{ $total_pages }}" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">{{ $total_pages}}</a>
        <a href="?page={{ $current_page + 1 }}" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
          <span class="sr-only">Next</span>
          <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
            <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
          </svg>
        </a>

        <a href="?page={{ $total_pages }}" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
          <span class="sr-only">Next</span>
          <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
            <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
          </svg>
        </a>

      </nav>
      </div>

    <script>
      const helpButton = document.getElementById("help");
      const helpSection = document.getElementById('SectionHelp');
      let help = false;

      helpButton.addEventListener('click',function() {
        if(help) {
          helpSection.style.display = 'none';
          helpButton.innerHTML = '<i style="color: white;font-size: 30px" class="fa-regular fa-circle-question"></i>';
        }
        else
        {
          helpSection.style.display = 'flex';
          helpButton.innerHTML = '<i style="color: white;font-size: 30px" class="fa-solid fa-circle-xmark"></i>';
        }
        help = !help;
        console.log(help);
      })
    </script>
</x-app-layout>
