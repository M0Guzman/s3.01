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
                    <li class="lien-section" id-section="1">Comment sécuriser mon compte ? (Double authentification)</li>
                    <li class="lien-section" id-section="1">Comment modifier mes informations personnelles ?</li>
                </ul>
            </li>
                    
            <!-- Séjour et Réservation -->
            <li class="menuFAQ">
                <h2>Séjour et Réservation</h2>
                <ul class="menuFAQ-lvl2">
                    <li class="lien-section" id-section="1">Comment choisir mon séjour ?</li>
                    <li class="lien-section" id-section="1">Puis-je annuler mon séjour ?</li>
                    <li class="lien-section" id-section="1">Puis-je réserver un séjour pour un groupe ?</li>
                    <li class="lien-section" id-section="1">Pourquoi ma réservation est en attente ou annulée ?</li>
                    <li class="lien-section" id-section="1">Quelle est la politique d'annulation d'un séjour ?</li>
                </ul>
            </li>
            
            <!-- Avis et Témoignages -->
            <li class="menuFAQ">
                <h2>Avis et Témoignages</h2>
                <ul class="menuFAQ-lvl2">
                    <li class="lien-section" id-section="1">Comment publier un avis sur un séjour ?</li>
                    <li class="lien-section" id-section="1">Comment signaler un avis ?</li>
                </ul>
            </li>
            
            <!-- Langue et Accessibilité -->
            <li class="menuFAQ">
                <h2>Langue et Accessibilité</h2>
                <ul class="menuFAQ-lvl2">
                    <li class="lien-section" id-section="1">Comment changer la langue du site ?</li>
                    <li class="lien-section" id-section="1">Puis-je naviguer sur le site sans créer de compte ?</li>
                </ul>
            </li>
            
            <!-- Données Personnelles et Sécurité -->
            <li class="menuFAQ">
                <h2>Données Personnelles et Sécurité</h2>
                <ul class="menuFAQ-lvl2">
                    <li class="lien-section" id-section="1">Comment accéder à mes données personnelles ?</li>
                    <li class="lien-section" id-section="1">Est-ce que mes informations sont partagées avec des tiers ?</li>
                </ul>
            </li>
            
            <!-- Retours, Réclamations et Litiges -->
            <li class="menuFAQ">
                <h2>Retours, Réclamations et Litiges</h2>
                <ul class="menuFAQ-lvl2">
                    <li class="lien-section" id-section="1">Comment retourner un produit ou un séjour ?</li>
                    <li class="lien-section" id-section="1">Puis-je demander un remboursement si je ne suis pas satisfait ?</li>
                </ul>
            </li>
        </ul>
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
                        <strong>Mot de passe</strong> <i class="fa-solid fa-triangle-exclamation"></i> il doit respecter les critères suivants<br>
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
        </div>
    
</x-app-layout>
