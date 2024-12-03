<x-app-layout>
    @vite(['resources/scss/panier.scss'])
    <main class="body">
        <div class="commande-container">
            <h1 class="commande-title">RÉCAPITULATIF DE LA COMMANDE</h1>
            <nav class="commande-nav">
                <ul>
                    <li class="active">Panier</li>
                    <li>Identifiez-vous</li>
                    <li>Adresse</li>
                    <li>CGV / CPV</li>
                    <li>Confirmation</li>
                </ul>
            </nav>
            @if($order == null)
            
                <div class="commande-panier">
                    <p class="panier-vide">Votre panier est vide</p>
                </div>
            
            @else
                <table>
                    <th>Nom du Sejour</th>
                    <th>Date du sejour</th>
                    <th>Nombre d'adulte(s)</th>
                    <th>Nombre d'enfant(s)</th>
                    <th>Prix</th>
                    @foreach ($order->bookings as $booking)
                    <tr>

                        <td id="title">{{ $booking->travel->title}}</td>
                        <td id="date">{{ Carbon\Carbon::createFromFormat('Y-m-d',$booking->start_date)->format('d/m/Y') }}</td>
                        <td id="adultes">{{ $booking->adult_count }} adulte(s)</td>
                        <td id="enfants">{{ $booking->children_count }} enfant(s)</td>
                        <td id="prix">{{ $booking->travel->price_per_person * ( $booking->adult_count + $booking->children_count ) }} € </td>
                        </tr>
                    @endforeach
                    
                    <tr>
                        <td>Prix total</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                              
                                {{ $order->bookings->sum(function($booking) { return $booking->travel->price_per_person * ( $booking->adult_count + $booking->children_count ); }) }} €
                            
                        </td>

                    </tr>
                </table>

            
            @endif
        </div>
    </main>
</x-app-layout>
