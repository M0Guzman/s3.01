<x-dashboard-layout>
    @vite(['resources/scss/dashboard/service_vente/addhotel.scss'])


    
    <div id="navigation">
        <a href="{{ route('dashboard.vente.hotel') }}">Hotels</a>
        <a href="{{ route('dashboard.vente.Partenaire.afficher') }}">Ajouter un Partenaire</a>
        <a href="{{ route('dashboard.vente.Sejour.afficher') }}">Séjour</a>
    </div>

    

    @if(session('success'))
        <div class="toast" id="toastMessage">
            <i class="fas fa-check-circle"></i> Partenaire Ajouté avec succès
        </div>
    @endif

    <form method="post" action="{{ route('dashboard.vente.Partenaire.create') }}" id="addhotel-form" class="address-form">
        @csrf
    

        <select id="typePartenaire" name="typePartenaire" onchange="afficherOption(event)">
            <option value="">Selectionner un type de Partenaire</option>
            @foreach($typePartenaires as $untype)
                <option value="{{ $untype->id }}">
                    {{ $untype->name }}
                </option>
            @endforeach
        </select>

        <div class="conteneur_ligne">
            <div id="name" class="conteneur_name_input">
                <label>Nom du Partenaire</label>
                <input type="text" name="name"  required/>
            </div>

            <div id="prix_enfant" class="conteneur_name_input">
                <label>Prix Adulte</label>
                <input type="number" name="prix_adulte" required/>
            </div>

            <div id="prix_adulte" class="conteneur_name_input">
                <label >Prix Enfant</label>
                <input type="number" name="prix_enfant" required/>
            </div>

            <div id="horaire" class="conteneur_name_input">
                <label >horaire</label>
                <input type="text" name="horaire" required/>
            </div>
        </div>

        <hr>

        <div class="conteneur_ligne">
            <div id="telephone" class="conteneur_name_input">
                <label >Numéro de telephone</label>
                <input type="text" name="telephone" required/>
            </div>
            <div id="email" class="conteneur_name_input">
                <label >Addresse mail</label>
                <input type="text" name="email" required/>
            </div>
        </div>

        <div class="conteneur_ligne">
            <div id="rue" class="conteneur_name_input">
                <label>Rue</label>
                <input id="rue" type="text" name="rue" required/>
            </div>
            <div id="cville" class="conteneur_name_input">
                <label >Ville</label>
                <input id="ville" type="text" name="ville" required/>
            </div>
            <div id="cdepartment" class="conteneur_name_input">
                <label>Départment</label>
                <select id="department" name="department" required>
                    <option>Selectionner un département</option>
                    @foreach($departments as $unDepartment)
                        <option value="{{ $unDepartment->id }}">
                            {{ $unDepartment->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <input id="cp" type="text" name="cp" required readonly/>
        </div>

        <hr>

    
        
        <div id="hotel" class="conteneur_ligne">

            <div id="categorie" class="conteneur_name_input">
                <label>Catégorie de l'hotel</label>
                <input type="text" name="categorie" />
            </div>

            <div id="nombre_chambre" class="conteneur_name_input"> 
                <label >Nombre de chambres</label>
                <input type="number"  name="nombre_chambre"/>
            </div>
        </div>

        <div id="restaurant" class="conteneur_ligne">

            <div id="specialite" class="conteneur_name_input"> 
                <label >Spécialité</label>
                <input type="text" name="specialite"/>
            </div>

            <div id="nombre_etoile" class="conteneur_name_input">
                <label>Nombre d'étoile</label>
                <input type="number" name="nombre_etoile"/>
            </div> 

            <div id="cookingtype" class="conteneur_name_input">
                <label>Type de cuisine</label>
                <select name="cookingType">
                    <option value="">Selectionner un type de Cuisine</option>
                    @foreach($cookingTypes as $onetype)
                        <option value="{{ $onetype->id }}">
                            {{ $onetype->name }}
                        </option>
                    @endforeach
                </select>
            </div>           
        </div>

        <div id="description" class="conteneur_name_input">
            <label>description</label>
            <textarea name="description"></textarea>
        </div>

        <div class="center">
            <button>Ajouter</button>
        </div>
        
    </form>

    <script>

        window.onload = function() {
            let toast = document.getElementById('toastMessage');
            if (toast) {
                // Faire disparaître le toast après 3 secondes
                setTimeout(function() {
                    toast.style.opacity = 0; // ou utilisez .remove() pour supprimer l'élément
                    toast.style.transition = 'opacity 1s ease'; // Ajout d'une transition pour l'effet
                }, 2000);
            }
        };

        function afficherOption(event) {
            // Récupérer la valeur de l'option sélectionnée
            const selectedOption = event.target.value;

            // Cacher les divs
            const hotelDiv = document.getElementById("hotel");
            const restaurantDiv = document.getElementById("restaurant");

            // Cacher toutes les divs avant de les afficher selon l'option sélectionnée
            hotelDiv.style.display = "none";
            restaurantDiv.style.display = "none";

            // Afficher la div en fonction de l'option sélectionnée
            if (selectedOption == 3) {
                hotelDiv.style.display = "flex";
            } else if (selectedOption == 2) {
                restaurantDiv.style.display = "flex";
            }
        }
    const api_url = "{{ route('autocomplete.cities') }}"
    </script>
    @vite(['resources/js/address.js'])

</x-dashboard-layout>