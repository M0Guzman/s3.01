<x-app-layout>
    @vite(['resources/scss/profile/panier.scss'])
    <main class="body">
        <div class="commande-container">
            <h1 class="commande-title">RÉCAPITULATIF DE LA COMMANDE</h1>
            <nav class="commande-nav">
                <ul>
                    <li class="active">Panier</li>
                    <a href="{{ route('register') }}"><li>Identifiez-vous</li></a>
                    <li>Adresse</li>
                    <li>CGV / CPV</li>
                    <li>Confirmation</li>
                </ul>
            </nav>

            @if($order == null || $order->bookings->count() == 0)

                <div class="commande-panier">
                    <p class="panier-vide">Votre panier est vide</p>
                </div>

            @else
                <div class="table">
                    <table>
                        <th>Nom du Sejour</th>
                        <th>Date du sejour</th>
                        <th>Nombre d'adulte(s)</th>
                        <th>Nombre d'enfant(s)</th>
                        <th>Nombre de chambre(s)</th>
                        <th>Prix</th>


                        @foreach ($order->bookings as $booking)
                            <tr>
                                <td id="title">
                                    <form action='{{ route('travel.edit', ['id' => $booking->travel->id, 'booking_id' => $booking->id]) }}' method='post'>
                                        @csrf
                                        <button name='action' type='submit' value='edit'>{{ $booking->travel->title }}</a>
                                    </form>
                                </td>
                                <td id="date">{{ $booking->start_date }}</td>
                                <td id="adultes">{{ $booking->adult_count }} adulte(s)</td>
                                <td id="enfants">{{ $booking->children_count }} enfant(s)</td>
                                <td id="chambres">{{ $booking->room_count }} chambre(s)</td>
                                <td id="prix">{{ $booking->travel->price_per_person * ($booking->adult_count + $booking->children_count) }} €</td>
                                <td id="img">
                                    <form action="{{ route('order.booking.remove') }}" method="post">
                                        @csrf

                                        <input type="number" class="hidden" name="booking_id" value="{{ $booking->id }}">

                                        <button type="submit">
                                            <img src="{{ Vite::asset('resources/images/delete.png') }}" alt="Supprimer" />
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach


                            <!-- verifie code renter et mettre value  -->
                        <tr>
                            <td>Prix total</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td> {{ $order->get_price() }}€
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        <td><a href="{{ route('order.process.address.show') }}">COMMANDER</button></td>
                        </tr>
                    </table>

                </div>
            @endif
        </div>
    </main>
</x-app-layout>
