<x-dashboard-layout>
    @vite(['resources/scss/dashboard/service_vente/sejour.scss'])

    <div id="navigation">
        <a href="{{ route('dashboard.vente.hotel') }}">Hotels</a>
        <a  href="{{ route('dashboard.vente.Partenaire.afficher') }}">Ajouter un Partenaire</a>
        <a href="{{ route('dashboard.vente.Sejour.afficher') }}">Séjour</a>
    </div>

@if(hasRole("executive"))

<!--
<div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
  <h1 class="text-2xl font-bold mb-4">Création de Séjour</h1>
  
  <form action="#" method="POST">
    <table class="table-auto border-collapse border border-gray-300 w-full text-left">
      <thead class="bg-gray-100">
        <tr>
          <th class="border border-gray-300 px-4 py-2 text-gray-700 font-semibold">Nom du Séjour</th>
          <th class="border border-gray-300 px-4 py-2 text-gray-700 font-semibold">Destination</th>
          <th class="border border-gray-300 px-4 py-2 text-gray-700 font-semibold">Durée</th>
          <th class="border border-gray-300 px-4 py-2 text-gray-700 font-semibold">Pour qui</th>
          <th class="border border-gray-300 px-4 py-2 text-gray-700 font-semibold">Envie</th>
        </tr>
      </thead>
      <tbody>
        <tr class="hover:bg-gray-50">
          <td class="border border-gray-300 px-4 py-2">
            <input 
              type="text" 
              name="nom_sejour[]" 
              placeholder="Nom du Séjour" 
              class="w-full px-2 py-1 border rounded focus:outline-none focus:ring focus:ring-blue-300">
          </td>
          <td class="border border-gray-300 px-4 py-2">
            <select 
              name="vignoble[]" 
              class="w-full px-2 py-1 border rounded focus:outline-none focus:ring focus:ring-blue-300">
              <option value="">Choisir</option>
              <option value="Vallée du Rhône">Vallée du Rhône</option>
              <option value="Alsace">Alsace</option>
              <option value="Beaujolais">Beaujolais</option>
              <option value="Bordeaux">Bordeaux</option>
              <option value="Bourgogne">Bourgogne</option>
              <option value="Catalogne">Catalogne</option>
              <option value="Champagne">Champagne</option>
              <option value="Jura">Jura</option>
              <option value="Languedoc-Roussillon">Languedoc-Roussillon</option>
              <option value="Paris">Paris</option>
              <option value="Provence">Provence</option>
              <option value="Savoie">Savoie</option>
              <option value="Sud-Ouest">Sud-Ouest</option>
              <option value="Val de Loire">Val de Loire</option>
            </td>
            <td class="border border-gray-300 px-4 py-2">
            <select 
              name="pour_durée[]" 
              class="w-full px-2 py-1 border rounded focus:outline-none focus:ring focus:ring-blue-300">
              <option value="">Choisir</option>
              <option value="1">1 jour</option>
              <option value="2">2 jours</option>
              <option value="3">3 jours</option>
              <option value="0.5">1/2 journée</option>
            </select>
          </td>
          <td class="border border-gray-300 px-4 py-2">
            <select 
              name="pour_qui[]" 
              class="w-full px-2 py-1 border rounded focus:outline-none focus:ring focus:ring-blue-300">
              <option value="">Choisir</option>
              <option value="Famille">Famille</option>
              <option value="Amis">Amis</option>
              <option value="Solo">Couple</option>
            </select>
          </td>
          <td class="border border-gray-300 px-4 py-2">
            <select 
              name="envie[]" 
              class="w-full px-2 py-1 border rounded focus:outline-none focus:ring focus:ring-blue-300">
              <option value="">Choisir</option>
              <option value="bien_etre">Bien-être</option>
              <option value="gastronomie">Gastronomie</option>
              <option value="golf">Golf</option>
              <option value="culture">Culture</option>
              <option value="bio">Bio</option>
              <option value="insolite">Insolite</option>
            </select>
          </td>
        </tr>
      </tbody>
    </table>

    <div class="mt-4">
      <button 
        type="submit" 
        class="bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600">
        Enregistrer
      </button>
    </div>
  </form>
</div>
@endif-->


    
    <form method="post" action="#" id="addhotel-form">
        @csrf
        

        <select id="TitreSejour" class="advancedSelect select2">
            @foreach($Travels as $oneTravel)
                <option value="{{$oneTravel}}"> 
                    {{$oneTravel->title}}
                </option>
            @endforeach
        </select>

        <div class="conteneur_ligne">
            

            <div id="prix" class="conteneur_name_input">
                <label>Prix par personne</label>
                <input type="number"  required/>
            </div>

            <div id="nbJour" class="conteneur_name_input">
                <label>Nombre de jour</label>
                
                <select 
                    name="pour_durée[]" 
                    class="w-full px-2 py-1 border rounded focus:outline-none focus:ring focus:ring-blue-300">
                    <option value="" default>Choisir</option>
                    <option value="1">1 jour</option>
                    <option value="2">2 jours</option>
                    <option value="3">3 jours</option>
                    <option value="0.5">1/2 journée</option>
                </select>
            </div>
        </div>
    </form>

    <hr>

    <div id="all_housing">

    
        <div class="contener_one_housing conteneur_ligne supprimable">
            <select id="typePartenaire" name="typePartenaire" onchange="afficherOption(event)">
                <option value="">Selectionner un hébergement</option>
                @foreach($hebergements as $unhebergement)
                    <option value="{{ $unhebergement->id }}">
                        {{ $unhebergement->partner->name }}
                    </option>
                @endforeach
            </select>
            <button onclick="supprimer(event)">Supprimer l'hébergement</button>
        </div>
    </div>

    <div class="center">
        <button onclick="add_housing()">Ajouter un hébergement</button>
    </div>

    <hr>

    <div id="all_domain">        
        <div class="contener_one_domain conteneur_ligne supprimable">
            <select id="typePartenaire" name="typePartenaire" onchange="afficherOption(event)">
                <option value="">Selectionner un domaine</option>
                @foreach($domains as $undomain)
                    <option value="{{ $undomain->id }}">
                        {{ $undomain->partner->name }}
                    </option>
                @endforeach
            </select>
            <button onclick="supprimer(event)">Supprimer le domaine</button>
        </div>
    </div>

    <div class="center">
        <button onclick="add_domain()">Ajouter un domaine / chateau</button>
    </div>

    <hr>

    <div id="all_steps_container">
        <div class="one_step_container supprimable">

            <div class="image-preview-container parent">

                <img class="preview" 
                src="{{ Vite::asset('resources/images/No_Image_Available.jpg') }}"
                onclick="triggerFileInput(this)"/>

                <input type="file" name="image" accept="image/*" class="file-input" onchange="previewImage(event)">
                <button class="buttonDelete" onclick="supprimer(event)">Supprimer l'étape</button>
            </div>
            <div class="container_TextEtape">
                <div class="TitreEtape">
                    <label>Titre de l'étape</label>
                    <input type="text"></input>
                </div>


                <div class="descriptionEtape">
                    <label>description de l'étape</label>
                    <textarea rows="5" cols="50"></textarea>
                </div>

            </div>
            

        </div>
    </div> 
    <hr>
    <div class="center">
        <button id="addEtape" onclick="addStep()">Ajouter une étape</button>
    </div>

    <script>

        function supprimer(event) {
            let divToDelete = event.target.closest('.supprimable')
            divToDelete.remove();
        }


        function add_domain() {
            // Créer un nouvel élément div pour contenir l'étape
            const domainContainer = document.createElement("div");
            domainContainer.classList.add("contener_one_domain");
            domainContainer.classList.add("supprimable");
            domainContainer.classList.add("conteneur_ligne");
            

            // Code HTML de l'étape
            const stepHTML = `
                <select id="typePartenaire" name="typePartenaire" onchange="afficherOption(event)">
                    <option value="">Selectionner un domaine</option>
                    @foreach($domains as $undomain)
                        <option value="{{ $undomain->id }}">
                            {{ $undomain->partner->name }}
                        </option>
                    @endforeach
                </select>
                <button onclick="supprimer(event)">Supprimer le domaine</button>
            `; // SELECT A MODIFIER ICI AUSSI

            // Ajouter le code HTML à l'élément stepContainer
            domainContainer.innerHTML = stepHTML;

            // Ajouter l'élément stepContainer dans le conteneur parent
            const alldomainContainer = document.getElementById("all_domain");
            alldomainContainer.appendChild(domainContainer);
        }



        function add_housing() {
            // Créer un nouvel élément div pour contenir l'étape
            const housingContainer = document.createElement("div");
            housingContainer.classList.add("contener_one_housing");
            housingContainer.classList.add("supprimable");
            housingContainer.classList.add("conteneur_ligne");

            // Code HTML de l'étape
            const stepHTML = `
                <select id="typePartenaire" name="typePartenaire" onchange="afficherOption(event)">
                    <option value="">Selectionner un hébergement</option>
                    @foreach($hebergements as $unhebergement)
                        <option value="{{ $unhebergement->id }}">
                            {{ $unhebergement->partner->name }}
                        </option>
                    @endforeach
                </select>
                <button onclick="supprimer(event)">Supprimer l'hébergement</button>
            `; // SELECT A MODIFIER ICI AUSSI

            // Ajouter le code HTML à l'élément stepContainer
            housingContainer.innerHTML = stepHTML;

            // Ajouter l'élément stepContainer dans le conteneur parent
            const allhousingContainer = document.getElementById("all_housing");
            allhousingContainer.appendChild(housingContainer);
        }

        
        function supprimer(event) {
            let divToDelete = event.target.closest('.supprimable')
            divToDelete.remove();
        }

        function triggerFileInput(imgElement) {
            // Trouver l'élément input qui est le frère de l'image
            const fileInput = imgElement.nextElementSibling; // Prend l'élément suivant (input file)
            
            // Simuler un clic sur l'input
            fileInput.click();
        }


        function previewImage(event) {
            const file = event.target.files[0]; // Le fichier sélectionné

            // Vérifie si un fichier est sélectionné
            if (file) {
                const preview = event.target.closest('.parent').querySelector('img');
                console.log(preview)
                const reader = new FileReader();

                // Lorsque le fichier est lu, mettre à jour l'élément <img> avec l'URL de données
                reader.onload = function(e) {
                    preview.src = e.target.result; // Met à jour la source de l'image
                };

                // Lire le fichier comme URL de données (Base64)
                reader.readAsDataURL(file);
            }
        }

        function addStep() {
            // Créer un nouvel élément div pour contenir l'étape
            const stepContainer = document.createElement("div");
            stepContainer.classList.add("one_step_container");
            stepContainer.classList.add("supprimable");
    
            // Code HTML de l'étape
            const stepHTML = `
                <div class="image-preview-container parent">

                    <img class="preview" 
                    src="{{ Vite::asset('resources/images/No_Image_Available.jpg') }}"
                    onclick="triggerFileInput(this)"/>

                    <input type="file" name="image" accept="image/*" class="file-input" onchange="previewImage(event)">
                    <button class="buttonDelete" onclick="supprimer(event)">Supprimer l'étape</button>
                </div>

                <div class="container_TextEtape">
                    <div class="TitreEtape">
                        <label>Titre de l'étape</label>
                        <input type="text"></input>
                    </div>


                    <div class="descriptionEtape">
                        <label>description de l'étape</label>
                        <textarea rows="5" cols="50"></textarea>
                    </div>

                </div>
            `;

            // Ajouter le code HTML à l'élément stepContainer
            stepContainer.innerHTML = stepHTML;

            // Ajouter l'élément stepContainer dans le conteneur parent
            const allstepsContainer = document.getElementById("all_steps_container");
            allstepsContainer.appendChild(stepContainer);
        }
    </script>

</x-dashboard-layout>