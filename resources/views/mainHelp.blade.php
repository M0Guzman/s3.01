<x-app-layout>
    @vite(['resources/scss/other/mainHelp.scss','resources/js/faq.js'])
    <div id="container_FAQ">
        <ul id="questions">
            <!-- Problèmes de Connexion et Comptes -->
            <li class="menuFAQ">
                <h2>Problèmes de Connexion et Comptes</h2>
                <ul class="menuFAQ-lvl2">
                    <li class="lien-section" id-section="1">Comment Créer un compte ?</li>
                    <li class="lien-section" id-section="2">Que faire si je ne parviens pas à me connecter à mon compte ?</li>
                    <!-- <li class="lien-section" id-section="1">Comment sécuriser mon compte ? (Double authentification)</li>
                    <li class="lien-section" id-section="3">Comment modifier mes informations personnelles ?</li>-->
                </ul>
            </li>
                    
            <!-- Séjour et Réservation -->
            <li class="menuFAQ">
                <h2>Séjour et Réservation</h2>
                <ul class="menuFAQ-lvl2">
                    <li class="lien-section" id-section="3">Comment choisir mon séjour ?</li>
                    <li class="lien-section" id-section="4">Puis-je annuler mon séjour ?</li>
                    <li class="lien-section" id-section="5">Puis-je réserver un séjour pour un groupe ?</li>
                    <li class="lien-section" id-section="6">Pourquoi ma réservation est en attente ou annulée ?</li>
                    <!--<li class="lien-section" id-section="1">Quelle est la politique d'annulation d'un séjour ?</li>-->
                </ul>
            </li>
            
            <!-- Avis et Témoignages Pas fait-->
            <!--<li class="menuFAQ">
                <h2>Avis et Témoignages</h2>
                <ul class="menuFAQ-lvl2">
                    <li class="lien-section" id-section="1">Comment publier un avis sur un séjour ?</li>
                    <li class="lien-section" id-section="1">Comment signaler un avis ?</li>
                </ul>
            </li>-->
            
            <!-- Langue et Accessibilité -->
            <li class="menuFAQ">
                <h2>Accessibilité</h2>
                <ul class="menuFAQ-lvl2">
                    <!-- <li class="lien-section" id-section="1">Comment changer la langue du site ?</li>-->
                    <li class="lien-section" id-section="7">Puis-je naviguer sur le site sans créer de compte ?</li>
                </ul>
            </li>
            
            <!-- Données Personnelles et Sécurité -->
            <li class="menuFAQ">
                <h2>Données Personnelles et Sécurité</h2>
                <ul class="menuFAQ-lvl2">
                    <li class="lien-section" id-section="8">Comment accéder à mes données personnelles ?</li>
                    <li class="lien-section" id-section="9">Est-ce que mes informations sont partagées avec des tiers ?</li>
                    <li class="lien-section" id-section="10">Comment supprimer mon compte ?</li>
                </ul>
            </li>
            
            <!-- Retours, Réclamations et Litiges -->
            <!--<li class="menuFAQ">
                <h2>Retours, Réclamations et Litiges</h2>
                <ul class="menuFAQ-lvl2">
                    
                    <li class="lien-section" id-section="11">Puis-je demander un remboursement si je ne suis pas satisfait ?</li>
                </ul>
            </li>
        </ul>-->
    </div>
        <div id="container_All_question">

            <div class="container_question" id="1"> 
                <div class="section">
                    <img class="image" src="{{ Vite::asset('resources/images/FAQ/creationCompte_1.png') }}"></img>
                    <p class="image-text">
                        Pour créer un compte, il vous suffit de remplir le formulaire avec les informations suivantes :<br><br>
                        
                        <strong>Prénom et Nom</strong> : Indiquez vos noms complets.<br>
                        <strong>Genre</strong> : Sélectionnez votre genre.<br>
                        <strong>Date de naissance</strong> : Choisissez votre date de naissance.<br>
                        <strong>Numéro de téléphone</strong> : Entrez un numéro valide pour être contacté.<br>
                        <strong>Email</strong> : Saisissez une adresse email valide.<br>
                        <strong>Mot de passe</strong> : <i class="fa-solid fa-triangle-exclamation"></i> il doit respecter les critères suivants<br>
                        Compris entre <strong>8 et 50 caractères</strong><br>
                        Doit contenir au moins <strong>une lettre MAJUSCULE ou minuscule</strong><br>
                        Doit contenir au moins <strong>un caractère spécial</strong><br>
                        Doit contenir au moins <strong>un chiffre</strong><br>

                        Exemple : Ceci&1Mot2Passe<br>        
                            
                        <strong>Confirmer le mot de passe</strong>  doit être identique au champ précédent.<br><br>

                        Cliquez ensuite sur <strong>"S'inscrire"</strong> pour finaliser la création de votre compte !<br><br>
                        
                        <strong>Nous collectons ses données uniquement pour assurer la qualité du service.</strong><br>
                        Pour en savoir plus sur l'usage de vos données, la sécurité et comment exercer vos droit,
                        <a href="{{ route('policies.privacy') }}">se réferer à notre politique de confidentialité</a><br>

                    </p>
                </div>

            </div>

            
            <div class="container_question" id="2"> 
                <div class="section">
                    <img class="image" src="{{ Vite::asset('resources/images/FAQ/mdpOublie.png') }}"></img>
                    <p class="image-text">
                    Si vous rencontrez un problème de connexion, il vous suffit de cliquer sur 'Mot de passe oublié'.
                    </p>
                </div>
                <div class="section">
                    <img class="image" src="{{ Vite::asset('resources/images/FAQ/mdpEmail.png') }}"></img>
                    <p class="image-text">
                    Vous devrez ensuite entrer votre adresse e-mail pour recevoir un message vous permettant de réinitialiser votre mot de passe.
                    </p>
                </div>
            </div>

            <div class="container_question" id="3"> 
                <div class="section">
                    <img class="image" src="{{ Vite::asset('resources/images/FAQ/sejourRecherche.png') }}"></img>
                    <p class="image-text">
                    Si vous souhaitez sélectionner un séjour, rendez-vous dans <a href="{{ route('travels.show') }}">'Tous nos séjours'</a> et appliquez les filtres de votre choix.
                        <br>
                    Ensuite, choisissez le séjour que vous souhaitez réserver
                    </p>
                </div>
                
            </div>

            <div class="container_question" id="4"> 
                <div class="section">
                    <!-- <img class="image" src="{{ Vite::asset('resources/images/FAQ/sejourRecherche.png') }}"></img>-->
                    <p class="image-text">
                    Pour annuler un sejour
                    <br>
                    Vous devriez attendre un e-mail vous confirmant les procédures de paiement. 
                    </p>
                </div>                
            </div>

            <div class="container_question" id="5"> 
                <div class="section">
                    <img class="image" src="{{ Vite::asset('resources/images/FAQ/editTravel.png') }}"></img>
                    <p class="image-text">
                    Pour réserver un séjour pour un groupe, vous devez choisir le séjour,
                    </p>
                </div> 
                
                <div class="section">
                    <img class="image" src="{{ Vite::asset('resources/images/FAQ/editNbPersonne.png') }}"></img>
                    <p class="image-text">
                    
                    puis sélectionner le nombre d'adultes et d'enfants, avec une limite de 15 adultes et 15 enfants.                    </p>
                </div> 

            </div>

            <div class="container_question" id="6"> 
                <div class="section">
                <h2>Reservation annuler</h2>
                    <p class="image-text">                        
                    Les réservations peuvent être annulées si aucun partenaire n'est disponible. Vous recevrez un remboursement intégral correspondant à la totalité de votre commande.                    </div> 
                <br>
                <div class="section">
                    <h2>Reservation attente</h2>
                    <p class="image-text">
                    Les réservations restent en attente tant que l'équipe de Vinotrip attend les réponses des partenaires.
                </p>
                </div> 
            </div>
            <div class="container_question" id="7"> 
                <div class="section">
                    <img class="image" src="{{ Vite::asset('resources/images/FAQ/identifiez_vous.png') }}"></img>
                    <p class="image-text">
                    Vous pouvez naviguer librement sans créer de compte.
                    <br>
                    Cependant, la création d'un compte est nécessaire pour effectuer une réservation de séjour.
                    </p>
                </div>                
            </div>

            <div class="container_question" id="8">

                <div class="section">
                    <img class="image" src="{{ Vite::asset('resources/images/FAQ/monCompte.png') }}"></img>
                    <p class="image-text">
                    Vous pouvez accéder à vos données personnelles dans <a href="{{route('profile.edit') }}">'Mon Compte'</a>.
                    <br>
                    </p>
                </div>

                <div class="section">
                <img class="image" src="{{ Vite::asset('resources/images/FAQ/addresse.png') }}"></img>
                    <p class="image-text">
                    Vous aurez accès à vos adresses enregistrées et à <a href="{{ route('order.history.show') }}">votre historique de commandes</a>.
                    </p>
                </div>           
            </div>

            <div class="container_question" id="9"> 
                <div class="section">
                    <img class="image" src="{{ Vite::asset('resources/images/FAQ/cookies.png') }}"></img>
                    <p class="image-text">
                    Nous n'utilisons aucun cookie, donc aucune information n'est transmise à des tiers.

                </div>                
            </div>

            <div class="container_question" id="10"> 
                <div class="section">
                    <img class="image" src="{{ Vite::asset('resources/images/FAQ/identifiez_vous.png') }}"></img>
                    <p class="image-text">
                    Vous pouvez supprimer votre compte dans <a href="{{route('profile.edit') }}">'Mon Compte'</a> en cliquant sur le bouton 'Supprimer mon compte'.
                </p>
                </div>                
            </div> 
        </div>
    
</x-app-layout>
