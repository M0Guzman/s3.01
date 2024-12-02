<x-app-layout>
    
    <!-- Contenu principal -->
    <main class="main_destinations">
        <h1 class="text-center text-3xl">Nos destinations</h1>
    </main>
    
    <!-- Contenu principal -->
    <main class="main_coeur">
        <h1 class="text-center text-3xl">Séjours coups de coeur</h1>
    </main>
    
    <!-- Contenu principal -->
     @vite(['resources/scss/app.scss'])
    <main class="main_avis">
        <h1 class="text-center text-3xl">Avis des voyageurs</h1>
        @foreach ($travels_avis as $travel_avis)
        <!--{{ $travel_avis }} -->
            <div class="avis_aficher mt-4">
                <div class="name">
                    <a href="https://www.vinotrip.com/fr/sejours-oenologiques/12-week-end-oenologique-saint-emilion.html" 
                        title="Saint-Emilion - Séjour oenologique">
                        {{ substr($travel_avis->title,0,50) }}
                    </a>
                    @php
                        $note = $travel_avis->reviews_avg_rating
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
                    <span class="note">{{ $travel_avis->reviews_avg_rating }}/5</span>
                </div>

                <div class="product_desc row">
                    <div class="avis_text">
                        <h2>{{ $travel_avis->review_title }}</h2>
                        <span class="comment">
                            {{ $travel_avis->review_desc }}
                        </span>
                        <span class="author">{{ $travel_avis->user_last_name }} <a>{{ $travel_avis->user_first_name }}</a>.</span>
                    </div>
                        
                    <div class="avis_nb">
                        <a class="reviews" href="https://www.vinotrip.com/fr/sejours-oenologiques/12-week-end-oenologique-saint-emilion.html#avis">
                        Lire les {{ $travel_avis->reviews_count }} avis
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </main>
</x-app-layout>