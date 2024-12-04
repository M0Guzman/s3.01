<x-app-layout>
    @vite(['resources/scss/modife.scss'])
    <div class="container">
        <h1>Votre séjour</h1>
        <div class="info-section">
            <div>
                <h2>Informations</h2>
                <p>Adultes: <input type="number"  min="1"></p>
                <p>Enfants: <input type="number"  min="0"></p>
                <p>Chambre(s): <input type="number" min="1"></p>
            </div>
            <div>
                <h2>Période du séjour</h2>
                <p>Début: <input type="date" value="{{ now() }}"></p>
            </div>
        </div>

        <div class="booking-section">
            <div class="card">
                <!-- <img src="https://via.placeholder.com/300x200">-->

                @if($travel->travel_steps->count() != 0 )
                    @foreach ( $travel->travel_steps as $travel_step)
                        @if($travel_step->activities->count() != 0 )
                            @foreach ($travel_step->activities as $activity)
                                <h2>{{ $activity->partner->hotel->title }}</h2>
                                <p> {{ $activity->partner->hotel->description }} </p>
                            @endforeach
                        @endif
                    @endforeach                    
                @endif
            </div>

            <div class="steps">
                <h2>Étapes de réservation</h2>
                <p><span>1</span> Vous confirmez votre demande de réservation. Nous revenons vers vous sous 24h après validation des disponibilités auprès de nos partenaires.</p>
                <p><span>2</span> Vous payez en ligne.</p>
                <p><span>3</span> Vous recevez votre carnet de route contenant toutes les informations pratiques (heures de rendez-vous, adresses...)</p>
                <p><strong>Bon voyage !</strong></p>
            </div>
        </div>

        <div class="options">
            <h2>Sélectionnez vos options</h2>
            <label><input type="radio" name="degustation" value="non" checked> Déjeuner dégustation: Non</label>
            <label><input type="radio" name="degustation" value="oui"> Déjeuner dégustation: Oui</label>
            <label><input type="radio" name="activities" checked> Activités: Fin Gourmet - Côte de Beaune</label>
        </div>

        <div class="price">
            PRIX TOTAL: {{ $travel->price_per_person }}
        </div>
        <form action="{{ route('addpanier.addPanier') }}" method="get">
            <button class="gift-option">RESERVER</button>
            
        </form>
    </div>


</x-app-layout>
