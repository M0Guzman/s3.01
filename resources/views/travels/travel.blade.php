<x-app-layout>
    @vite(['resources/scss/travel.scss'])
    <section>

        <!-- container séjour -->
        <div class="container_sejour">
            <div class="image-section">
                <img src="{{ $travel->resources[0]->get_url() }}">
            </div>
            <section class="info-section">
                <div class="header">

                    <h3>{{ $travel->title }}</h3>
                </div>
                <div class="price">
                    <p><strong>{{ $travel->days }} jours | {{ $travel->days - 1 }} nuit</strong></p>
                    <p><span class="amount">{{ $travel->price_per_person }} €</span>/pers.</p>
                </div>
                <div class="details">
                    <p>{{ $travel->description}}</p>

                </div>
                <form action="{{ route('travel.edit', ['id' => $travel->id]) }}" method="post">
                    @csrf

                    <div class="footer">
                        <button class="gift-option" type="submit" name='action' value="gift">J'opte pour le format cadeau</button>

                        <p class="validity">Cadeau valable jusqu’au <strong> {{ $date }} </strong></p>
                        <p>Disponible aux formats :
                            <span class="format">e-coffret (envoi immédiat)</span> |
                            <span class="format">coffret (livraison sous 4 à 6 jours ouvrés)</span>
                        </p>
                    </div>
                    <div id="panier">
                        <button id="paniers" type="submit" name='action' value="for_me">Ajouter aux panier</button>
                    </div>
                </form>

                <div class="avis mt-4">
                        @foreach ($travel->reviews as $review)

                            <h3>{{ $review->title }}</h3>
                            {{ $review->rating }} étoiles <br>
                            {{ $review->description }}

                        @endforeach
                </div>
            </div>
        </div>

        <!-- container détaillé séjour -->
        <h2 class="text-center text-3xl">Le programme détaillé de votre séjour</h2>
        <div class="container_etapes">
            @foreach ($travel->travel_steps as $travelStep)
                <div class="container_etape">
                    <div class="image-section">
                        <img src="{{ $travelStep->resources[0]->get_url() }}">
                    </div>
                    <div class="info-section">
                        <h3>{{ $travelStep->title }}</h3>
                        <p>
                            {{ $travelStep->description }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- container hébergements -->
        <h2 class="text-center text-3xl">Les hébergements</h2>
        <div class="container_etapes">
            @foreach ($travel->travel_steps as $travelStep)
                @foreach ($travelStep->activities as $activitiy)
                    @if( $activitiy->partner->hotel != null)
                        <div class="container_etape">
                            <h3>{{ $activitiy->title }}</h3>
                            <p>
                                {{ $activitiy->description }}
                            </p>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>

        <!-- container partenaire autre que hotel et restaurant -->
        <h2 class="text-center text-3xl">Les châteaux et les domaines...</h2>
        <div class="container_etapes">
            @foreach ($travel->travel_steps as $travelStep)
                @foreach ($travelStep->activities as $activitiy)
                    @if( $activitiy->partner->winecellar != null || $activitiy->partner->restaurant != null)
                        <div class="container_etape">
                            <h3>{{ $activitiy->title }}</h3>
                            <p>
                                {{ $activitiy->description }}
                            </p>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>

        <!-- container d'avis -->
        <h2 class="text-center text-3xl">Les Avis</h2>
        <div class="container_avis mt-4">
            @foreach ($travel->reviews as $review)
                <div class="avis_aficher">
                    <h3>
                        {{ $review->title }}
                        @php
                            $note = $review->rating
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
                        <span class="note">{{ $review->rating }}/5</span>
                    </h3>
                    {{ $review->description }}
                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>
