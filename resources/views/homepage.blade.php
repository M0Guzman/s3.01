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
</head>
<body class="antialiased">
    <!-- En-tête -->
    <header>
        <!-- Bande supérieure -->
        <div class="header-top">
            <ul>
                <li><a href="#">Bénéficiaire cadeau</a></li>
                <li><a href="#">Contact</a></li>
                <li><span>01 85 46 00 09</span></li>
                <li>
                    <i class="fa-solid fa-child" style="color: #ffffff;"></i>
                    <a href="#">Mon compte</a>
                </li>
                <li>
                    <a href="#" class="panier">
                        <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
                        <span>Panier</span>
                        <span class="panier-count">0</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Bande inférieure -->
        <div class="header-bottom">
            <div class="logo">
                <!--<img src="path-to-logo.png" alt="Logo VinoTrip">-->
                <p>Créateurs de séjours œnotouristiques</p>
            </div>
            <nav class="navigation">
            <ul class="hList">
                    <li><a href="#"><p class="menu-title">Tous nos séjours</p></a></li>
                    <li class="menu">
                        <a href="#"><p class="menu-title">Destinations</p></a>
                        <ul class="menu-dropdown">
                            <li><a href="https://www.vinotrip.com/fr/sejours-oenologiques-alsace">Alsace</a></li>
                            <li><a href="https://www.vinotrip.com/fr/sejours-oenologiques-bordeaux">Bordeaux</a></li>
                            <li><a href="https://www.vinotrip.com/fr/sejours-oenologiques-champagne">Champagne</a></li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#"><p class="menu-title">Thématiques</p></a>
                        <ul class="menu-dropdown">
                            <li><a href="https://www.vinotrip.com/fr/sejours-oenologiques-alsace">Alsace</a></li>
                            <li><a href="https://www.vinotrip.com/fr/sejours-oenologiques-bordeaux">Bordeaux</a></li>
                            <li><a href="https://www.vinotrip.com/fr/sejours-oenologiques-champagne">Champagne</a></li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#"><p class="menu-title">Coffret cadeau</p></a>
                        <ul class="menu-dropdown">
                            <li><a href="https://www.vinotrip.com/fr/sejours-oenologiques-alsace">Alsace</a></li>
                            <li><a href="https://www.vinotrip.com/fr/sejours-oenologiques-bordeaux">Bordeaux</a></li>
                            <li><a href="https://www.vinotrip.com/fr/sejours-oenologiques-champagne">Champagne</a></li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#"><p class="menu-title">Préparer votre séjour</p></a>
                        <ul class="menu-dropdown">
                            <li><a href="https://www.vinotrip.com/fr/sejours-oenologiques-alsace">Alsace</a></li>
                            <li><a href="https://www.vinotrip.com/fr/sejours-oenologiques-bordeaux">Bordeaux</a></li>
                            <li><a href="https://www.vinotrip.com/fr/sejours-oenologiques-champagne">Champagne</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    
    <!-- Contenu principal -->
    <main class="main_destinations">
        <h1>Nos destinations</h1>
    </main>
    
    <!-- Contenu principal -->
    <main class="main_coeur">
        <h1>Séjours coups de coeur</h1>
    </main>
    
    <!-- Contenu principal -->
    <main class="main_avis">
    <h1>Avis des voyageurs</h1>
        <div class="avis_aficher">
            <div class="name">
                <a href="https://www.vinotrip.com/fr/sejours-oenologiques/12-week-end-oenologique-saint-emilion.html" 
                    title="Saint-Emilion - Séjour oenologique">
                    Saint-Emilion - Séjour oenologique
                </a>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star-half-stroke"></i>
                <i class="fa-regular fa-star"></i>
                <span class="note">4,8/5</span>
            </div>

            <div class="product_desc row">
                <div class="avis_text">
                    <span class="comment">
                        Très belle expérience avec Vinotrip. Nous étions au château la rose Perriere. 
                        Nous avons été très bien accueillis. La salle de bain était immense ! 
                        Un séjour très agréable. Le choix de Vinotrip pour le clos Mirande comme restaurant était excellent !
                    </span>
                    <span class="author">Célia J.</span>
                </div>
                    
                <div class="avis_nb">
                    <a class="reviews" href="https://www.vinotrip.com/fr/sejours-oenologiques/12-week-end-oenologique-saint-emilion.html#avis">
                    Lire les 60 avis
                    </a>
                </div>
            </div>
        </div>

    </main>
</body>
</html>