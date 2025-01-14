
@vite(['resources/scss/global/help.scss','resources/js/help.js'])

<button id="Button_Aide">?</button>

<div id="modal_aide" class="hidden">
    <div id="modal-content">
        <!-- Contenu de la modale -->
        <div id="modal-header">
            <div id="buttonBack"><i class="fa-solid fa-arrow-left"></i></div>
            <h2>Voici quelques lien pour vous aider</h>
        </div>
        <div id="modal-body" class="content"> 
            <ul id="listquestions">
                <li id-section-help="help1" class="onequestion">Connexion et compte</li>
                <li id-section-help="help2" class="onequestion">Réserver un séjour</li>
                <li id-section-help="help3" class="onequestion">Vos données personnelles</li>
                <li id-section-help="help4" class="onequestion">Contacter le support</li>
                <li class="onequestion"><a href="{{ route('mainHelp') }}">Page d'aide</a></li>
            </ul>
        </div>
        <div id="help1" class="hidden content"> 
            <p>
                Vous pouvez vous connecter <a href="{{ route('register') }}">ici</a> :<br>
                Renseignez simplement votre adresse email et votre mot de passe. <br>
                Si vous avez oublié votre mot de passe, vous avez la possibilité de le réinitialiser.<br><br><br>

                Pour créer votre compte, veuillez remplir <a href="{{ route('register') }}">le formulaire disponible ici :</a><br><br>

                Vous devrez fournir quelques informations personnelles (nom, prénom, téléphone, email).<br>
                Ces informations sont nécessaires pour vous offrir la meilleure expérience possible lors de votre futur séjour Vinotrip.<br><br>

                <strong>Pour votre mot de passe</strong> <i class="fa-solid fa-triangle-exclamation"></i> vous allez devoir respecter les critères suivants :<br><br>
                
                Longueur comprise entre <strong>8 et 50 caractères</strong><br>
                Doit contenir au moins <strong>une lettre majuscule ou minuscule</strong><br>
                Doit inclure <strong>un caractère spécial</strong><br>
                Doit comporter <strong>au moins un chiffre</strong><br><br>
                
                Exemple : <strong>Ceci&1Mot2Passe</strong>

                <a href="{{ route('policies.privacy') }}">En savoir plus sur la collecte et l'usage de vos données</a>
            </p>
        </div>
        <div id="help2" class="hidden content"> 
            <p>
            Tous les séjours sont <a href="{{route('travels.show')}}">disponibles ici. </a><br>
            Choisissez un séjour qui vous plaît, puis sélectionnez "Découvrir l'offre".<br><br>

            Une fois sur la page du séjour, deux options s'offrent à vous :<br><br>

            <strong>o Choisir le format cadeau :</strong><br>
            Cette option vous permet d'offrir le séjour sélectionné à la personne de votre choix.<br>
            L'heureux destinataire pourra choisir la date de départ et personnaliser certaines options de son séjour.<br><br>

            <strong>o Ajouter au panier :</strong><br>
            Cette option vous permet de réserver le séjour.<br>
            Vous pourrez alors indiquer la date de départ ainsi que le nombre d'adultes et d'enfants.<br><br>


            <a href="{{ route('policies.terms') }}">En savoir plus sur notre politique de vente</a>
            </p>
        </div>
        <div id="help3" class="hidden content"> 
            <p>
                Chez Vinotrip, la sécurité de vos données personnelles est notre priorité.<br>
                C'est pourquoi nous n'utilisons que les cookies nécessaires au bon fonctionnement du site,<br>
                et nous avons veillé à ce que tous les cookies que vous pouvez refuser ne soient pas présents sur notre plateforme.<br><br>

                Lors de la création de votre compte, certaines informations vous seront demandées.<br>
                Ces données permettent de vous identifier et de gérer vos futurs séjours Vinotrip.<br><br>
                Si vous réservez un séjour, vos informations peuvent être transmises à nos partenaires (hôtels, restaurants)<br>
                afin d'assurer la qualité de leurs services.<br><br>

                <strong>Les données collectées incluent :</strong><br><br>
                <strong>o Nom et prénom :</strong> Pour gérer vos réservations et vous contacter.<br>
                <strong>o Date de naissance :</strong> Afin de vérifier que vous êtes majeur, car nos séjours sont destinés aux adultes.<br>
                <strong>o Genre :</strong> Information facultative, partagée uniquement si vous le souhaitez.<br>
                <strong>o Numéro de téléphone :</strong> Essentiel pour nous permettre de vous contacter après votre réservation et récupérer votre compte en cas d'oubli de mot de passe.<br>
                <strong>o Adresse e-mail :</strong> Nécessaire pour sécuriser votre compte, recevoir des factures et des informations relatives à vos réservations et séjours.<br><br><br>
            

                <strong>Destinataires des données :<br><br>
            
                </strong>Les données sont destinées aux services clients et facturation de Vinotrip, ainsi qu'à nos sous-traitants (hôtels, restaurants) pour organiser les séjours.<br><br><br>
                
                
                <strong>Durée de conservation :</strong><br><br>
                
                Les données sont conservées pendant la durée de la relation commerciale et jusqu’à 10 ans pour les obligations comptables. Les données de fidélisation et prospection sont conservées pendant 3 ans.<br><br><br>
                
                
                <strong>Vos droits :</strong><br><br>
                
                Vous pouvez accéder, rectifier, effacer vos données, ou demander leur portabilité. Pour exercer vos droits, contactez notre DPO par email à <strong>thomas.betrix@etu.univ-smb.fr</strong> ou par courrier postal.<br><br><br>


                <a href="{{ route('policies.cookies') }}">En savoir plus sur notre politique de cookies</a><br>
                <a href="{{ route('policies.privacy') }}">En savoir plus sur notre politique de confidencialité</a>
                
            </p>
        </div>
        <div id="help4" class="hidden content"> 
            <p>
                Pour contacter notre support,<br>
                vous pouvez nous appeler au <strong>07 66 69 71 18</strong> <br>
                ou nous envoyer un email à <strong>Contact@vinotrip.fr</strong>.<br><br>

                Pour exercer vos droits sur les données personnelles, contactez notre DPO par email à <strong>thomas.betrix@etu.univ-smb.fr</strong><br><br>

                <a href="{{ route('policies.terms') }}">En savoir plus sur notre politique de vente</a><br>
                <a href="{{ route('policies.cookies') }}">En savoir plus sur notre politique de cookies</a><br>
                <a href="{{ route('policies.privacy') }}">En savoir plus sur notre politique de confidencialité</a>
            </p>

        </div>
    </div>
</div>
