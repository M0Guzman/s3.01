<x-app-layout>
    @vite(['resources/scss/travel.scss'])
        <section>
        <div class="container">
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
                <div class="footer">
                    <a href="{{ route('panier.show') }}"><button class="gift-option">J'opte pour le format cadeau</button></a>
                    <p class="validity">Cadeau valable jusqu’au <strong> {{ $date }} </strong></p>
                    <p>Disponible aux formats :
                        <span class="format">e-coffret (envoi immédiat)</span> |
                        <span class="format">coffret (livraison sous 4 à 6 jours ouvrés)</span>
                    </p>
                </div>
                <div id="panier">
                    <a href="{{ route('panier.show') }}"><button id="paniers">Ajouter aux panier</button></a>
                </div>
                <div class="avis mt-4">
                        @foreach ($travel->reviews as $review)

                            <h3>{{ $review->title }}</h3>
                            {{ $review->rating }} étoiles <br>
                            {{ $review->description }}

                        @endforeach
                </div>                
            </div>
        </div>
    </section>
</x-app-layout>
