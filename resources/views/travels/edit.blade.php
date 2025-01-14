<x-app-layout>
    @vite(['resources/scss/travel/modife.scss'])
    <form action="{{ route('order.update_booking') }}" method="post">
        @csrf
        <div class="container">
            <h1>Votre séjour</h1>

            <!-- Section Informations -->
            <div class="info-section">
            <div>
                <h2>Informations</h2>

                <label for="adult_count">Adultes :</label>
                <input type="number" id="adult_count" name="adult_count" value="{{ $booking != null ? $booking->adult_count : 1 }}" min="1" max="15">

                <br>

                <label for="children_count">Enfants :</label>
                <input type="number" id="children_count" name="children_count" value="{{ $booking != null ? $booking->children_count : 0 }}" min="0" max="15">

                <br>

                <label for="room_count">Chambre(s) :</label>
                <input type="number" id="room_count" name="room_count" value="{{ $booking != null ? $booking->room_count : 1 }}" min="1" max="30">
            </div>

                <div>
                    <h2>Période du séjour</h2>
                    <p>Début:
                    <input type="date" id="dateInput" name="start_date"
                    value="{{ $booking != null ? $booking->start_date : \Carbon\Carbon::now()->format('Y-m-d') }}">
                </div>
            </div>

            <!-- Section Détails Booking -->
            <div class="booking-section">
                <div></div>

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
                                    <p>Prix Enfant : {{ $activity->children_count_price }} €</p>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                @endif
            </div>

            <!-- Section Prix Total -->
            <div class="price" id="totalPrice">
                PRIX TOTAL: {{ $travel->price_per_person * (($booking != null ? $booking->adult_count : 1) + ($booking != null ? $booking->children_count_count : 0)) }} €
            </div>

            <!-- Champs Cachés -->
            <input type="hidden" value="{{ $travel->id }}" name="travel_id"/>
            <input type="hidden" value="{{ $booking != null ? $booking->id : null }}" name="booking_id" optional/>
            <input type="hidden" value="{{ $action }}" name="action"/>
            <input class="gift-option" type="submit" value="RESERVER" id="submitButton" disabled />
        </div>
    </form>
    <script>

        const baseAdultPrice = {{ $travel->price_per_person }};
        const baseChildPrice = {{ $travel->price_per_person }};

        function updateTotalPrice() {
            // Récupérer les valeurs des inputs
            const numadult_count = parseInt(document.getElementById('adult_count').value) || 0;
            const numchildren_count = parseInt(document.getElementById('children_count').value) || 0;
            const numroom_counts = parseInt(document.getElementById('room_count').value) || 0;

            // Calcul des prix de base pour les adultes et enfants
            let totalPrice = (numadult_count * baseAdultPrice) + (numchildren_count * baseChildPrice);

            // Ajouter les prix des activités sélectionnées
            document.querySelectorAll('.activity-group').forEach(group => {
                const isSelected = group.querySelector('input[type="radio"][value="yes"]').checked;
                if (isSelected) {
                    const adultPrice = parseFloat(group.dataset.adultPrice) || 0;
                    const childPrice = parseFloat(group.dataset.children_countPrice) || 0;

                    totalPrice += (numadult_count * adultPrice) + (numchildren_count * childPrice);
                }
            });

            if(document.getElementById('room_count').value < Math.floor(document.getElementById('adult_count').value / 2))
            {
                document.getElementById('room_count').value = Math.floor(document.getElementById('adult_count').value / 2) +1;
                document.getElementById('room_count').min = Math.floor(document.getElementById('adult_count').value / 2) +1
            }
            // Mettre à jour le prix total dans l'interface

            document.getElementById('totalPrice').innerText = `PRIX TOTAL: ${totalPrice.toFixed(2)} €`;
        }

        function updateDate() {

            const dateInput = (document.getElementById('dateInput').value);
            const dateInputM = new Date(dateInput).getTime();
            const today = new Date();
            const todayM = today.getTime();

            if (dateInputM <= todayM)
            {
                document.getElementById('submitButton').disabled = true;
            }
            else
            {
                document.getElementById('submitButton').disabled = false;
            }

        }
        document.addEventListener('DOMContentLoaded', () => {
            updateTotalPrice();
            updateDate();
        });

        document.getElementById("dateInput").addEventListener('change', () => updateDate());
        document.getElementById("room_count").addEventListener('change', () => updateTotalPrice());
        document.getElementById("adult_count").addEventListener('change', () => updateTotalPrice());
        document.getElementById("children_count").addEventListener('change', () => updateTotalPrice());

    </script>
</x-app-layout>
