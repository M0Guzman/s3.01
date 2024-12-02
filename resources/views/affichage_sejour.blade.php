<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Homepage alexis">
    <title>Homepage</title>
    @vite(['resources/scss/app.scss'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/js/all.min.js" integrity="sha512-1JkMy1LR9bTo3psH+H4SV5bO2dFylgOy+UJhMus1zF4VEFuZVu5lsi4I6iIndE4N9p01z1554ZDcvMSjMaqCBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <body>
        <div class="sejour-card">
            <h3 class="sejour-title">
                {{ $sejour->title }}
            </h3>

            <p class="sejour-price">
                {{ $sejour->price }}
            </p>

            <p class="sejour-description">
                {{ $sejour->description }}
            </p>

            <p class="sejour-days">
                <strong>{{ $sejour->days }} jours | {{ $sejour->days - 1 }} nuit</strong>
            </p>

            <p class="sejour-gift-text">
                J’opte pour le format cadeau
            </p>

            <p class="sejour-validity">
                Cadeau valable jusqu’au <strong>{{ date('d/m/Y', strtotime($sejour->valid_until)) }}</strong>
            </p>

            <p class="sejour-formats-title">
                <strong>Disponible aux formats :</strong>
            </p>
        <ul class="sejour-formats">
            <li>e-coffret (envoi immédiat)</li>
            <li>coffret (livraison sous 4 à 6 jours ouvrés)</li>
        </ul>
    </div>

    </body>
