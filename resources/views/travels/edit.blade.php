<x-app-layout>
    @vite(['resources/scss/modife.scss'])
    <form action="{{ route('order.update_booking') }}" method="post">
        @csrf
        <div class="container">
            <h1>Votre séjour</h1>

            <!-- Section Informations -->
            <div class="info-section">
                <div>
                    <h2>Informations</h2>

                    <label for="adults">Adultes :</label>
                    <input type="number" id="adults" name="adults" value="{{ $booking != null ? $booking->adult_count : 1 }}" min="1" onchange="updateTotalPrice()">

                    <br>

                    <label for="children">Enfants :</label>
                    <input type="number" id="children" name="children" value="{{ $booking != null ? $booking->children_count : 0 }}" min="0" onchange="updateTotalPrice()">

                    <br>

                    <label for="room">Chambre(s) :</label>
                    <input type="number" id="room" name="room" value="{{ $booking != null ? $booking->room_count : 1 }}" min="1" onchange="updateTotalPrice()">
                </div>
                <div>
                    <h2>Période du séjour</h2>
                    <p>Début:
                        <input type="date" id="dateInput" name="dateInput"
                            value="{{ $booking != null ? $booking->start_date : Carbon\Carbon::now()->format('Y-m-d') }}"
                            onchange="updateDate()">
                    </p>
                </div>
            </div>

            <!-- Section Détails Booking -->
            <div class="booking-section">
                <div class="card">
                    @if($travel->travel_steps->count() != 0 )
                        @foreach ($travel->travel_steps as $travel_step)
                            @if($travel_step->activities->count() != 0 )
                                @foreach ($travel_step->activities as $activity)
                                    @if($activity->partner->activity_type->name == 'Hotel')
                                        <h2>{{ $activity->partner->name }}</h2>
                                        <p>{{ $activity->partner->hotel->description }}</p>
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

            <!-- Section Options -->
            <div class="options">
                <h2>Sélectionnez vos options</h2>
                @if($travel->travel_steps->count() != 0 )
                    @foreach ($travel->travel_steps as $travel_step)
                        @foreach ($travel_step->activities as $activity)
                            @if($activity->partner->activity_type != null && $activity->partner->activity_type->name == 'Hotel')
                                <div class="activity-group" data-activity-id="{{ $activity->id }}"
                                     data-adult-price="{{ $activity->adult_price }}"
                                     data-children-price="{{ $activity->children_price }}">

                                    <label>
                                        <input type="radio" name="activity_{{ $activity->id }}" value="no" checked onchange="updateTotalPrice()">
                                        {{ $activity->name }}: Non ({{$activity->timeslot}})
                                    </label>
                                    <label>
                                        <input type="radio" name="activity_{{ $activity->id }}" value="yes" onchange="updateTotalPrice()">
                                        {{ $activity->name }}: Oui
                                    </label>

                                    <p>Prix Adulte : {{ $activity->adult_price }} €</p>
                                    <p>Prix Enfant : {{ $activity->children_price }} €</p>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                @endif
            </div>

            <!-- Section Prix Total -->
            <div class="price" id="totalPrice">
                PRIX TOTAL: {{ $travel->price_per_person * (($booking != null ? $booking->adult_count : 1) + ($booking != null ? $booking->children_count : 0)) }} €
            </div>

            <!-- Champs Cachés -->
            <input type="hidden" value="{{ $travel->id }}" name="travel_id"/>
            <input type="hidden" value="{{ $booking != null ? $booking->id : null }}" name="booking_id"/>
            <input type="hidden" value="{{ $action }}" name="action"/>
            <input class="gift-option" type="submit" value="RESERVER" />
        </div>
    </form>

    <script>
        const baseAdultPrice = {{ $travel->price_per_person }};
        const baseChildPrice = {{ $travel->price_per_person }};

        function updateTotalPrice() {
            // Récupérer les valeurs des inputs
            const numAdults = parseInt(document.getElementById('adults').value) || 0;
            const numChildren = parseInt(document.getElementById('children').value) || 0;
            const numRooms = parseInt(document.getElementById('room').value) || 0;

            // Calcul des prix de base pour les adultes et enfants
            let totalPrice = (numAdults * baseAdultPrice) + (numChildren * baseChildPrice);

            // Ajouter les prix des activités sélectionnées
            document.querySelectorAll('.activity-group').forEach(group => {
                const isSelected = group.querySelector('input[type="radio"][value="yes"]').checked;
                if (isSelected) {
                    const adultPrice = parseFloat(group.dataset.adultPrice) || 0;
                    const childPrice = parseFloat(group.dataset.childrenPrice) || 0;

                    totalPrice += (numAdults * adultPrice) + (numChildren * childPrice);
                }
            });

            // Mettre à jour le prix total dans l'interface
            document.getElementById('totalPrice').innerText = `PRIX TOTAL: ${totalPrice.toFixed(2)} €`;
        }

        function updateDate() {
            const selectedDate = document.getElementById('dateInput').value;
            document.getElementById('date').value = selectedDate;
        }

        // Initialisation au chargement
        document.addEventListener('DOMContentLoaded', () => {
            updateTotalPrice();
            updateDate();
        });
    </script>
</x-app-layout>
