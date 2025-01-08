<x-dashboard-layout>
    
    @vite(['resources/scss/dashboard/service_vente/hotel.scss','resources/js/RechercheCustom.js'])
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div id="navigation">
        <a href="{{ route('dashboard.vente.hotel') }}">Hotels</a>
        <a  href="{{ route('dashboard.vente.Partenaire.afficher') }}">Ajouter un Partenaire</a>
        <a href="{{ route('dashboard.vente.Sejour.afficher') }}">Séjour</a>
    </div>
    

    <div id="container_infoHotel">
        <select id="objectMSG" class="advancedSelect select2">
            <option value="1">Informations complémentaire</option>
            <option value="1">Ajouter un Hotel</option>
            <option value="1">Custom</option>
        </select>
        <select id="Destinataire" class="advancedSelect select2">
            <option value="thomas.betrix@etu.univ-smb.fr">THOMAS</option>
            @foreach($hotels as $unhotel)
                <option value="{{$unhotel->partner->email}}"> 
                    {{$unhotel->partner->name}} {{$unhotel->partner->email}}
                </option>
            @endforeach
        </select>
        <button id="send">Envoyer</button>
    </div>

    
    <div id="container_mail">
        <textarea id="text" name="message" rows="20" cols="20">
Madame, Monsieur,

Je me permets de vous contacter au nom de VinoTrip, une société spécialisée dans l'organisation de séjours et de voyages. 
Dans le cadre de l'élargissement de notre offre, nous envisageons de proposer à nos clients un séjour incluant l'hébergement dans votre établissement, l'hôtel [Nom de l'Hôtel] situé à [Adresse de l'Hôtel].

Afin de pouvoir étudier la faisabilité de cette collaboration, nous souhaiterions obtenir des informations détaillées concernant les options d'hébergement disponibles au sein de votre hôtel. Plus précisément, nous serions intéressés par les éléments suivants :

Types de chambres proposées (single, double, suites, etc.)
Tarifs applicables pour les groupes et les séjours prolongés
Disponibilités pour des séjours de [indiquer la période ou les dates souhaitées]
Services supplémentaires (repas, transfert, activités, etc.)
Conditions de réservation et annulation pour les groupes
Capacités d'accueil pour un groupe (nombre de chambres disponibles et capacité maximale)

Nous serions également heureux d'explorer d'autres options ou services que vous proposez et qui pourraient être intéressants pour nos clients.

Nous vous remercions par avance pour les informations que vous pourrez nous fournir et nous restons à votre disposition pour convenir d’un rendez-vous téléphonique ou d'une rencontre si nécessaire.

Dans l'attente de votre réponse, je vous prie d'agréer, Madame, Monsieur, l'expression de mes salutations distinguées.

[votre Nom]
[votre Prénom]
Responsable du Service Marketing de VinoTrip
07 66 69 71 18
contact@vinotrip.fr
        </textarea>
    </div>

    <script>
        function clearText() {
            const zoneText = document.getElementById("text")
            zoneText.value = "";
        }
</script>


</x-dashboard-layout>