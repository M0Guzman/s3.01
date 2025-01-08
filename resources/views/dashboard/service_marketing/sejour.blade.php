<x-dashboard-layout>
    @vite(['resources/scss/dashboard/service_vente/sejour.scss'])

    <div id="navigation">
        <a href="{{ route('dashboard.vente.hotel') }}">Hotels</a>
        <a  href="{{ route('dashboard.vente.Partenaire.afficher') }}">Ajouter un Partenaire</a>
        <a href="{{ route('dashboard.vente.Sejour.afficher') }}">Séjour</a>
    </div>

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
                <input type="number"  required/>
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