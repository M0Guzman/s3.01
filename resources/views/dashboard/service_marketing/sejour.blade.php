<x-dashboard-layout>
    @vite(['resources/scss/dashboard/service_vente/sejour.scss','resources/js/dashboard/sejour.js'])

    <div id="navigation">
        <a href="{{ route('dashboard.vente.hotel') }}">Hotels</a>
        <a  href="{{ route('dashboard.vente.Partenaire.afficher') }}">Ajouter un Partenaire</a>
        <a href="{{ route('dashboard.vente.Sejour.afficher') }}">Séjour</a>
    </div>

    <div class="toast" id="toastMessage">
    </div>

    <select id="TitreSejour" class="advancedSelect select2">
        <option selected>Selectionner un séjour</option>
        @foreach($Travels as $oneTravel)
            <option value="{{$oneTravel}}">
                {{$oneTravel->title}}
            </option>
        @endforeach
    </select>

    <div id="informationSejour">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <div class="conteneur_ligne">
            <div id="prix" class="conteneur_name_input">
                <label>Prix par personne</label>
                <input id="TravelPrice" type="number"  required readonly/>
            </div>

            <div id="nbJour" class="conteneur_name_input">
                <label>Nombre de jour</label>
                <input id="TravelDay" type="number"  required readonly/>
            </div>
        </div>
    

        <hr>

        <div id="all_housing">

        
            <div class="contener_one_housing conteneur_ligne supprimable">
                <select id="typePartenaire" name="typePartenaire" class="select_housing">
                    <option value="none">Selectionner un hébergement</option>
                    @foreach($hebergements as $unhebergement)
                        <option value="{{ $unhebergement->partner_id }}">
                            {{ $unhebergement->partner->name }}
                        </option>
                    @endforeach
                </select>
                <button class="buttonDelete" type="button" onclick="divToDelete()">Supprimer l'hébergement</button>
            </div>
        </div>

        <div class="center">
            <button id="buttonAddHousing" type="button">Ajouter un hébergement</button>
        </div>

        <hr>

        <div id="all_domain">        
            <div class="contener_one_domain conteneur_ligne supprimable">
                <select id="typePartenaire" name="typePartenaire" class="select_domain">
                    <option value="">Selectionner un domaine</option>
                    @foreach($domains as $undomain)
                        <option value="{{ $undomain->partner_id }}">
                            {{ $undomain->partner->name }}
                        </option>
                    @endforeach
                </select>
                <button class="buttonDelete" type="button" onclick="divToDelete()">Supprimer le domaine</button>
            </div>
        </div>

        <div class="center">
            <button id="buttonAddDomain" type="button">Ajouter un domaine / chateau</button>
        </div>

        <hr>

        <div id="all_steps_container">
            <div class="one_step_container supprimable">

                <div class="image-preview-container parent">

                    <img class="preview" onclick="preview(this)"
                    src="{{ Vite::asset('resources/images/No_Image_Available.jpg') }}"/>

                    <input type="file" name="image" accept="image/*" class="file-input" onchange="changeFile(event)">
                    <button class="buttonDelete" onclick="divToDelete()">Supprimer l'étape</button>
                </div>
                <div class="container_TextEtape">
                    <div class="TitreEtape">
                        <label>Titre de l'étape</label>
                        <input class="titleStepText" type="text"></input>
                    </div>


                    <div class="descriptionEtape">
                        <label>description de l'étape</label>
                        <textarea class="descriptionStepText" rows="5" cols="50"></textarea>
                    </div>

                </div>
                

            </div>
        </div> 
        <div class="center">
            <button type="button" id="addEtape">Ajouter une étape</button>
        </div>
        <hr>
        <div class="conteneur_name_input">
            <label>Description Global du Séjour</label>
            <textarea id="descriptionSejour"></textarea>
        </div>
        <hr>
        <div class="center">
            <button id="ValiderForm">Valider Séjour</button>
        </div>
    </div>


    <script>

        const road = "{{ route('dashboard.vente.Sejour.modifier') }}"

        TitreSejour.addEventListener('change', function() {
            console.log(TitreSejour.value)
        // Récupère la valeur de l'option sélectionnée   
            if (TitreSejour.selectedIndex == 0) {
                informationSejour.style.display = 'none';
            }
            else if (TitreSejour.value != null) {
                let selectedOption = TitreSejour.options[TitreSejour.selectedIndex];
                
                let travelPrice = document.getElementById("TravelPrice");
                let travelDay = document.getElementById("TravelDay");
                
                informationSejour.style.display = 'block';
                
                let data = JSON.parse(selectedOption.value)
                travelPrice.value = data["price_per_person"];
                travelDay.value = data["days"];
            }
        });

        document.getElementById('buttonAddHousing').addEventListener('click', function() {
            // Créer un nouvel élément div pour contenir l'étape
            const housingContainer = document.createElement("div");
            housingContainer.classList.add("contener_one_housing");
            housingContainer.classList.add("supprimable");
            housingContainer.classList.add("conteneur_ligne");

            // Code HTML de l'étape
            const stepHTML = `
                <select id="typePartenaire" name="typePartenaire" class="select_housing">
                        <option value="">Selectionner un hébergement</option>
                        @foreach($hebergements as $unhebergement)
                            <option value="{{ $unhebergement->partner_id }}">
                                {{ $unhebergement->partner->name }}
                            </option>
                        @endforeach
                    </select>
                <button class="buttonDelete" type="button" onclick="divToDelete()">Supprimer l'hébergement</button>
            `; 

            housingContainer.innerHTML = stepHTML;

            // Ajouter l'élément stepContainer dans le conteneur parent
            const allhousingContainer = document.getElementById("all_housing");
            allhousingContainer.appendChild(housingContainer);
        });

        document.getElementById('buttonAddDomain').addEventListener('click', function() {
            // Créer un nouvel élément div pour contenir l'étape
            const domainContainer = document.createElement("div");
            domainContainer.classList.add("contener_one_domain");
            domainContainer.classList.add("supprimable");
            domainContainer.classList.add("conteneur_ligne");
            

            // Code HTML de l'étape
            const stepHTML = `
                <select id="typePartenaire" name="typePartenaire" class="select_domain">
                    <option value="">Selectionner un domaine</option>
                    @foreach($domains as $undomain)
                        <option value="{{ $unhebergement->partner_id  }}">
                            {{ $undomain->partner->name }}
                        </option>
                    @endforeach
                </select>
                <button class="buttonDelete" type="button" onclick="divToDelete()">Supprimer le domaine</button>
            `; // SELECT A MODIFIER ICI AUSSI

            // Ajouter le code HTML à l'élément stepContainer
            domainContainer.innerHTML = stepHTML;

            // Ajouter l'élément stepContainer dans le conteneur parent
            const alldomainContainer = document.getElementById("all_domain");
            alldomainContainer.appendChild(domainContainer);
        });

        function divToDelete() {
            let divToDelete = event.target.closest('.supprimable')
            divToDelete.remove();
        }

        function preview(imgElement) {
            const fileInput = imgElement.nextElementSibling; 
            fileInput.click();
        }
        

        function changeFile(event) {
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
        };

        document.getElementById('addEtape').addEventListener('click',function() {

            // Créer un nouvel élément div pour contenir l'étape
            const stepContainer = document.createElement("div");
            stepContainer.classList.add("one_step_container");
            stepContainer.classList.add("supprimable");

            // Code HTML de l'étape
            const stepHTML = `
                <div class="image-preview-container parent">

                    <img class="preview" onclick="preview(this)"
                    src="{{ Vite::asset('resources/images/No_Image_Available.jpg') }}"/>

                    <input type="file" name="image" accept="image/*" class="file-input" onchange="changeFile(event)">
                    <button class="buttonDelete" onclick="divToDelete()">Supprimer l'étape</button>
                </div>

                <div class="container_TextEtape">
                    <div class="TitreEtape">
                        <label>Titre de l'étape</label>
                        <input class="titleStepText" type="text"></input>
                    </div>


                    <div class="descriptionEtape">
                        <label>description de l'étape</label>
                        <textarea class="descriptionStepText" rows="5" cols="50"></textarea>
                    </div>
                </div>
            `;

            // Ajouter le code HTML à l'élément stepContainer
            stepContainer.innerHTML = stepHTML;

            // Ajouter l'élément stepContainer dans le conteneur parent
            const allstepsContainer = document.getElementById("all_steps_container");
            allstepsContainer.appendChild(stepContainer);
        })

    </script>

</x-dashboard-layout>