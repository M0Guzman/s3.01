<x-app-layout>
    @vite(['resources/scss/travel/detail_travel.scss'])

        <div id="container_sejour">

            <section id="container_left">

                <img id="image_travel" src="{{  $travel->resources[0]->get_url() }}">

                <div id="container_button_left">
                    <button id="button-programme" class="button-programme" href="#Programme" name='action'>Programme du séjour</button>
                    <button id="button-hébergement" class="button-programme" href="#Hebergement"  name='action'>Hébergements</button>
                    <button id="button-domaine" class="button-programme" href="#Domaine" name='action'>Chateaux / Domaine</button>
                    <button id="button-avis" class="button-programme" href="#Avis" name='action'>Avis {{ count($travel->reviews) }}</button>
                </div>
                <hr class="hr_etape">
                <div id="Programme">
                <h2 class="titre_info">Le programme détaillé de votre séjour</h2>
                    @foreach ($travel->travel_steps as $travelStep)
                        <div class="container_etape">
                            <div class="image-section">
                                <img class="img-etape" src="{{  $travelStep->resources[0]->get_url() }}">
                            </div>
                            <div class="info-section">
                                <h3 class="titre-etape">{{ $travelStep->title }}</h3>
                                <p>
                                    {{ $travelStep->description }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr class="hr_etape">
                <div id="Hebergement">
                    <h2 class="titre_info">hébergements</h2>
                    @foreach ($travel->travel_steps as $travelStep)
                        @foreach ($travelStep->activities as $activity)
                            @if( $activity->partner->hotel != null)
                                <div class="container_etape">
                                    <div class="image-section">
                                        <img class="img-etape" src="{{  $activity->partner->resources[0]->get_url() }}">
                                    </div>
                                    <div class="info-section">
                                        <h3 class="titre-etape">{{ $activity->partner->name }}</h3>
                                        <p>
                                            {{ $activity->partner->description }}
                                        </p>
                                        <br>
                                        <a href="https://paris-clignancourt-montmartre.kyriad.com/fr-fr/?utm_source=bing&utm_medium=cpc&utm_campaign=ASUC%20-%20KY%20FR%20T1%20-%20Bing%20-%20SN%20-%20Gen%20%2B%20Geo%20IMC%20-%20FR&utm_content=KY%20FR%20T1%20-%20Bing%20-%20Gen%20%2B%20Paris%20FR&utm_"  target="_blank">En savoir plus sur notre partenaire {{$activity->partner->name}}</a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
                <hr class="hr_etape">
                <div id="Domaine">
                    <h2 class="titre_info">Chateau et Domaine</h2>
                    @foreach ($travel->travel_steps as $travelStep)
                        @foreach ($travelStep->activities as $activity)
                            @if( $activity->partner->wine_cellar != null)
                                <div class="container_etape">
                                    <div class="image-section">
                                        <img class="img-etape" src="{{  $activity->partner->resources[0]->get_url() }}">
                                    </div>
                                    <div class="info-section">
                                        <h3 class="titre-etape">{{ $activity->partner->name }}</h3>
                                        <p>
                                            {{ $activity->partner->description }}
                                        </p>
                                        <br>
                                        <a href="https://www.lescavesduvieuxpressoir.com/" target="_blank">En savoir plus sur notre partenaire {{$activity->partner->name}}</a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
                <hr class="hr_etape">
                <div id="Avis">
                    <h2 class="titre_info">Les Avis</h2>
                    <div class="container_avis">
                        @foreach ($travel->reviews as $review)
                            <div class="avis_afficher">
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

                </div>


            </section>
            <div id="container_right">
                <div id="container_right_fixe">

                    <section id="container_right_information">

                        <h1 id="titre">{{ $travel->title }}</h1>

                        <div id="container_price_day">
                            <hr>
                            <p id="jours">{{ $travel->days }}
                                @if( $travel->days >1)jours | {{ $travel->days -1 }} nuit
                                @else
                                    journée
                                @endif
                            </p>

                            <h1 id="price">{{ $travel->price_per_person }} € par personne</h1>
                            <hr>
                        </div>

                        <div id="details">
                            <p>{{ $travel->description}}</p>
                        </div>

                        <hr class="hr_etape">

                        <p id="validity">Cadeau valable jusqu’au <strong> {{ $date }} </strong></p>
                        <p>Disponible aux formats :
                            <p class="format">e-coffret (envoi immédiat)</p>
                            <p class="format">coffret (livraison sous 4 à 6 jours ouvrés)</p>
                        </p>

                    </section>

                    <div id="container_button_right">
                        <form action="{{ route('travel.edit', ['id' => $travel->id]) }}" method="post">
                            @csrf

                            <button id="gift" class="button button-acheter" type="submit" name='action' value="gift">J'opte pour le format cadeau</button>
                            <button id="paniers" class="button button-acheter" type="submit" name='action' value="for_me">Ajouter aux panier</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
</x-app-layout>
