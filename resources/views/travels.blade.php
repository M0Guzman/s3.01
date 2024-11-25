<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Filtres Séjours Œnologiques</title>
  @vite(['resources/scss/app.scss'])
</head>
<header>
        <!-- Bande supérieure -->
        <div class="header-top">
            <ul>
                <li><a href="#">Bénéficiaire cadeau</a></li>
                <li><a href="#">Contact</a></li>
                <li><span>01 85 46 00 09</span></li>
                <li><a href="#">Mon compte</a></li>
                <li>
                    <a href="#" class="panier">
                        <span>Panier</span>
                        <span class="panier-count">0</span>
                    </a>
                </li>
            </ul>
        </div>
 
        <!-- Bande inférieure -->
        <div class="header-bottom">
            <div class="logo">
                <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="Logo VinoTrip">
                <p>Créateurs de séjours œnotouristiques</p>
            </div>
            <nav class="navigation">
                <ul>
                    <li><a href="#">Tous nos séjours</a></li>
                    <li><a href="#">Destinations</a></li>
                    <li><a href="#">Thématiques</a></li>
                    <li><a href="#">Coffret cadeau</a></li>
                    <li><a href="#">Préparer votre séjour</a></li>
                </ul>
            </nav>
        </div>
    </header>

<body>
    <br>
  <div class="filters-container">
    <h1>Séjours Œnologiques</h1>
    <br>
    <p> Personnalisez votre séjour œnologique en 
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
                 de l’amateur au néophyte, de trouver leur bonheur.</p>
    <div class="filters">
      <select id="vignoble" name="vignoble">
        <option value="" selected>Quel vignoble ?</option>
        <option value="Alsace">Alsace</option>
        <option value="Beaujolais">Beaujolais</option>
        <option value="Bordeaux">Bordeaux</option>
        <option value="bourgogne">Bourgogne</option>
        <option value="Catalogne">Catalogne</option>
        <option value="Champagne">Champagne</option>
        <option value="Jura">Jura</option>
        <option value="Languedoc-roussilon">Languedoc-roussilon</option>
        <option value="Paris">Paris</option>
        <option value="Provence">Provence</option>
        <option value="Savoie">Savoie</option>
        <option value="Sud-ouest">Sud-ouest</option>
        <option value="Val de loire">Val de loire</option>
        <option value="Vallée du rhône">Vallée du rhône</option>
      </select>
      <select id="duree" name="duree">
        <option value=""  selected>Durée ?</option>
        <option value="1/2">Demi-journée</option>
        <option value="1">1 jour</option>
        <option value="2">2 jour / 1 nuit</option>
        <option value="3">3 jours / 2 nuits</option>
      </select>
      <select id="pour-qui" name="pour-qui">
        <option value="" selected>Pour qui ?</option>
        <option value="couple">Couple</option>
        <option value="famille">Famille</option>
        <option value="Amis">Amis</option>
      </select>
      <select id="envie" name="envie">
        <option value="" selected>Une envie particulière ?</option>
        
        <option value="bien-etre">Bien-être</option>
        <option value="gastronomie">Gastronomie</option>
        <option value="culture">Culture</option>
        <option value="Golf">Golf</option>
        <option value="Bio">Bio</option>
        <option value="Insolite">Insolite</option>
      </select>
      <button id="search-button">Rechercher</button>
    </div>
  </div>

  <section class="sejour">            
                <div id="num1">
                    <br>
                    <p> image avec etiquette pour le prix</p>
                    <p>Titre sejour</p>                                        
                    <p id="vignoble">Quel vignoble</p> <p id="avis">moyenne avis avec etoiles</p>
                    <p id="description">Debut desc sejour</p>
                    <p id="jours">nb jours</p> 
                    <a href="#"><button> Decouvrir l'offre</button></a>
                </div>
                <div id="num1">
                    <br>
                    <p> image avec etiquette pour le prix</p>
                    <p>Titre sejour</p>                    
                    <p id="vignoble">Quel vignoble</p> <p id="avis">moyenne avis avec etoiles</p>
                    <p id="description">Debut desc sejour</p>
                    <p id="jours">nb jours</p> 
                    <a href="#"><button> Decouvrir l'offre</button></a>
                </div>
                <div id="num1">
                    <br>
                    <p> image avec etiquette pour le prix</p>
                    <p>Titre sejour</p>                    
                    <p id="vignoble">Quel vignoble</p> <p id="avis">moyenne avis avec etoiles</p>
                    <p id="description">Debut desc sejour</p>
                    <p id="jours">nb jours</p> 
                    <a href="#"><button> Decouvrir l'offre</button></a>
                </div>
            
        </section>


  @vite(['resources/js/app.js'])
</body>
</html>
