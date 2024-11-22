<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vinotrip - Séjours œnologiques</title>
    @vite(['resources/scss/app.scss'])
</head>
<body>
    <header class="header">
        <div class="logo">
            <!--<img src="./images/logo.png" alt="Vinotrip Logo">-->
            <span>VINOTRIP</span>
        </div>
        <nav class="navbar">
            <a href="#">TOUS NOS SÉJOURS</a>
            <a href="#">DESTINATIONS</a>
            <a href="#">THÉMATIQUES</a>
            <a href="#">COFFRET CADEAU</a>
            <a href="#">PRÉPARER VOTRE SÉJOUR</a>
        </nav>
        <div class="header-right">
            <a href="#">CONTACT</a>
            <a href="#">01 85 46 00 09</a>
            <a href="#" class="account">MON COMPTE</a>
            <a href="#" class="cart">PANIER <span class="cart-count">0</span></a>
            <div class="lang-switch">
                <a href="#">FR</a> | <a href="#">EN</a>
            </div>
        </div>
    </header>

    <main>
        <nav class="breadcrumb">
            <a href="#">Accueil</a> &gt; <span> Séjours</span>
        </nav>
        <section class="content">
            <h1>SÉJOURS ŒNOLOGIQUES</h1>
            <h2>Comment choisir son séjour œnologique</h2>
            <p>
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
            </p>
        
        </section>
        <section class="filtre">
            <div id="filtreI">
                Quel Vignoble? <!--menu defilant -->
            </div>
            <div id="filtreI">
                Durée? <!--menu defilant -->
            </div>
            <div id="filtreI">
                Pour Qui? <!--menu defilant -->
            </div>
            <div id="filtreI">
                Une Envie Particuliere? <!--menu defilant -->
            </div>
            <button id="filtreB">
                recherche
            </button>
        </section>
        
            <div id="trier_prix">
                <p>Trier par</p> <!--menu defilant (du + cher au - cher ou du - cher au + cher--> 
            </div>
        
        <br>
        <section class="sejour">            
                <div id="num1">
                    <br>
                    <p> image avec etiquette pour le prix</p>
                    <p>Titre sejour</p>                                        
                    <p id="vignoble">Quel vignoble</p> <p id="avis">moyenne avis avec etoiles</p>
                    <p id="description">Debut desc sejour</p>
                    <p id="jours">nb jours</p> 
                </div>
                <div id="num1">
                    <br>
                    <p> image avec etiquette pour le prix</p>
                    <p>Titre sejour</p>                    
                    <p id="vignoble">Quel vignoble</p> <p id="avis">moyenne avis avec etoiles</p>
                    <p id="description">Debut desc sejour</p>
                    <p id="jours">nb jours</p> 
                </div>
                <div id="num1">
                    <br>
                    <p> image avec etiquette pour le prix</p>
                    <p>Titre sejour</p>                    
                    <p id="vignoble">Quel vignoble</p> <p id="avis">moyenne avis avec etoiles</p>
                    <p id="description">Debut desc sejour</p>
                    <p id="jours">nb jours</p> 
                </div>
            
        </section>
    </main>
</body>
</html>
