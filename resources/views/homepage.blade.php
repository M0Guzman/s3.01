<x-app-layout>
    @vite(['resources/scss/homePage/avis.scss','resources/scss/homePage/destination.scss','resources/scss/homePage/video.scss'])


    <main>
        <div id="video_container">
            <iframe
                id="background_video"
                class="video-stream"
                src="https://www.youtube.com/embed/UBYRBxo7PHg?autoplay=1&mute=1&loop=1&rel=0&showinfo=0&modestbranding=1&playlist=UBYRBxo7PHg&loop=1"
                frameborder="0"
                allow="autoplay; encrypted-media"
                allowfullscreen>
            </iframe>
        </div>
    </main>

    <!-- Contenu principal -->
    <main class="main_destinations container">
        <h1>Nos destinations</h1>


    </main>

    <!-- Contenu principal -->
    <main class="main_coeur container">
        <h1>Séjours coups de coeur</h1>
    </main>


    <!-- Contenu principal -->
    <main class="main_avis container">
        <h1>Avis des voyageurs</h1>
        @foreach ($travels_avis as $travel_avis)
            <div class="container_one_review">

                <div class="review-topinfo-container">

                    <a class="review-title hover_underline" href="{{ route('travel.show', [ 'id' => $travel_avis->id ]) }}">
                        {{ substr($travel_avis->title,0,50) }}
                    </a>
                    <div class="review-rating-container">

                        @php
                            $note = $travel_avis->reviews_avg_rating
                        @endphp
                        @for ($i = 0; $i < 5; $i++)
                            @if ($note >= 1)
                                <i class="fa-solid fa-star star"></i>
                            @elseif ($note < 0.5)
                                <i class="fa-regular fa-star star"></i>
                            @else
                                <i class="fa-regular fa-star-half-stroke star"></i>
                            @endif
                            @php
                                $note --
                            @endphp
                        @endfor

                        <span class="note">{{ round($travel_avis->reviews_avg_rating, 1) }}/5</span>
                    </div>
                </div>

                <div class="review-bottominfo-container">
                    <div class="review-content">
                        <!-- <h2>{{ $travel_avis->review_title }}</h2> -->
                        <span class="comment">
                            {{ $travel_avis->review_desc }}
                        </span>
                        <span class="author">{{ $travel_avis->user_last_name }} {{ $travel_avis->user_first_name }}.</span>
                    </div>

                    <a class="reviews hover_underline" href="{{ route('travel.show', [ 'id' => $travel_avis->id ]) }}">
                        Lire les {{ $travel_avis->reviews_count }} avis
                    </a>
                </div>
            </div>
        @endforeach
    </main>
</x-app-layout>
