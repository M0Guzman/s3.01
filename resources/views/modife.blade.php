<x-app-layout>
    @vite(['resources/scss/modife.scss'])
<form action="{{ route('addpanier.addPanier') }}" method="get">
    <div class="container">
        <h1>Votre séjour</h1>
        <div class="info-section">
            <div>
                <h2>Informations</h2>

                <label for="adults">Adultes :</label>
                <input type="number" id="adults" name="adults" value="{{ $booking != null ? $booking->adult_count : 1 }}" min="1" onchange="updatePrice()">
                
                <br>

                <label for="children">Enfants :</label>
                <input type="number" id="children" name="children" value="{{ $booking != null ? $booking->children_count : 0 }}" min="0" onchange="updatePrice()">

                <br>

                <label for="room">Chambre(s) :</label>
                <input type="number" id="room" name="room" value="{{ $booking != null ? $booking->room_count : 1 }}" min="1" onchange="updatePrice()">
            </div>
            <div>
                <h2>Période du séjour</h2>
                <p>Début: <input type="date" id="dateInput" name="dateInput" value="{{ $booking != null ? $booking->start_date : Carbon\Carbon::now()->format('Y-m-d') }}" onchange="updateDate()"></p>
            </div>
        </div>

        <div class="booking-section">
            <div class="card">
    
                @if($travel->travel_steps->count() != 0 )
                    @foreach ( $travel->travel_steps as $travel_step)
                        @if($travel_step->activities->count() != 0 )
                            @foreach ($travel_step->activities as $activity)                                
                                @if($activity->partner->activity_type->name == 'hotel' )  <!-- changer activity->activity_category en activity_types -->
                                    <h2>{{ $activity->partner->name }}</h2>                                   
                                    <p> {{ $activity->partner->hotel->description }} </p>
                                    {{ $activity->partner->hotel }}
                                    @break                                    
                                @endif 
                            @endforeach
                            @break
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
                @if($travel->travel_steps->count() != 0 )
                    @foreach ( $travel->travel_steps as $travel_step)
                        @foreach ($travel_step->activities as $activity) 
                        @if($activity->activity_category->name == 'hotel')
                            <label>
                                <input type="radio" name="{{ $activity->name }}" checked> {{ $activity->name }}: Non
                            </label>
                            <label>
                                <input type="radio" name="{{ $activity->name }}"> {{ $activity->name }}: Oui
                            </label>
                        @endif

                        @endforeach 
                    @endforeach                   
                @endif
        </div>

        <div class="price" id="totalPrice">
            PRIX TOTAL: {{ $travel->price_per_person * (($booking != null ? $booking->adult_count : 1) + ($booking != null ? $booking->children_count : 0)) }} €
        </div>
        
        <input class="gift-option" type="submit" value="RESERVER" />
        <input type="hidden" value="{{$booking }}" name="etat"/>
        <input type="hidden" value="{{ $travel->id }}" name="id" />
        </div>
    </form>
     

    <script>
                    const adultPrice = {{ $travel->price_per_person }};
                    const childPrice = {{ $travel->price_per_person }};
                    const roomPrice = 250;

                    function updatePrice() {
                        const numAdults = parseInt(document.getElementById('adults').value) || 0;
                        const numChildren = parseInt(document.getElementById('children').value) || 0;
                        const numRooms = parseInt(document.getElementById('room').value) || 0;

                        // Calcul du prix total
                        const totalPrice = (numAdults * adultPrice) + (numChildren * childPrice) + ((numRooms - 1) * roomPrice);
                        document.getElementById('totalPrice').innerText = `PRIX TOTAL: ${totalPrice.toFixed(2)} €`;

                        // Mise à jour des champs cachés
                        document.getElementById('adultes').value = numAdults;
                        document.getElementById('enfants').value = numChildren;
                        document.getElementById('chambres').value = numRooms;
                    }

                    function updateDate() {
                        const selectedDate = document.getElementById('dateInput').value;
                        document.getElementById('date').value = selectedDate;
                    }

                    // Ajouter les événements onchange
                    document.getElementById('adults').addEventListener('change', updatePrice);
                    document.getElementById('children').addEventListener('change', updatePrice);
                    document.getElementById('room').addEventListener('change', updatePrice);
                    document.getElementById('dateInput').addEventListener('change', updateDate);

                    // Initialisation au chargement de la page
                    document.addEventListener('DOMContentLoaded', () => {
                        updatePrice();
                        updateDate();
                    });
                </script>
</x-app-layout>
