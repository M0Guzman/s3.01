
@vite(['resources/scss/global/help.scss','resources/js/help.js'])

<button id="Button_Aide">?</button>

<div id="modal_aide" class="hidden">
    <div id="modal-content">
        <!-- Contenu de la modale -->
        <div id="modal-header">
            <h2>Perdu sur le site ?<br>Voici quelques liens pour t'aider</h>
        </div>
        <div id="modal-body"> 
            <ul id="theme">
                <li class="li">Connexion et compte</li>
                <li class="li">Commande et paiement</li>
                <li class="li">Séjour et Réservation</li>
                <li class="li">Support</li>
                <li class="li">Accessibilité</li>
            </ul>
            <p id="Connexion">Cliquez sur "Connexion" dans la barre latérale pour continuer.</p>
            <p id="Commande">Renseignez vos informations pour effectuer un paiement sécurisé.</p>
        </div>
    </div>
</div>
