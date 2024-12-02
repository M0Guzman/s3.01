<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="travel">
    <title>Travel</title>
    @vite(['resources/scss/travel.scss'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/js/all.min.js" integrity="sha512-1JkMy1LR9bTo3psH+H4SV5bO2dFylgOy+UJhMus1zF4VEFuZVu5lsi4I6iIndE4N9p01z1554ZDcvMSjMaqCBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <body>
        <div class="container">
            <div class="image-section">
                <img src="{{ $travel->ressources[0]->get_url() }}">
            </div>
            <div class="info-section">
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
                    <button class="gift-option">J'opte pour le format cadeau</button>
                    <p class="validity">Cadeau valable jusqu’au <strong> {{ $date }} </strong></p>
                    <p>Disponible aux formats : 
                        <span class="format">e-coffret (envoi immédiat)</span> | 
                        <span class="format">coffret (livraison sous 4 à 6 jours ouvrés)</span>
                    </p>
                </div>
                <div class="avis">
                        @foreach ($travel->reviews as $review)
                        
                            <h3>{{ $review->title }}</h3>
                            {{ $review->rating }} étoiles <br>
                            {{ $review->description }}
                        
                        @endforeach                    
                </div>
            </div>
        </div>
    </body>
</head>
</html>
