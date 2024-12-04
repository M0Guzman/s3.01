<x-app-layout>
    @vite(['resources/scss/panier.scss'])
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
                        <th>Prix</th>

                        
                        @foreach ($order->bookings as $booking)
                        <tr>
                            <td id="title">{{ $booking->travel->title}}</td>
                            <td id="date">{{ Carbon\Carbon::createFromFormat('Y-m-d',$booking->start_date)->format('d/m/Y') }}</td>
                            <td id="adultes">{{ $booking->adult_count }} adulte(s)</td>
                            <td id="enfants">{{ $booking->children_count }} enfant(s)</td>
                            <td id="prix">{{ $booking->travel->price_per_person * ( $booking->adult_count + $booking->children_count ) }} € </td>
                            <td id="img"><img src="{{ Vite::asset('resources/images/delete.png') }}"></td>
                        </tr>
                        @endforeach
                        
                        <tr>
                            <td>Prix total</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td> {{ $order->bookings->sum(function($booking) { return $booking->travel->price_per_person * ( $booking->adult_count + $booking->children_count ); }) }}
                            </td>

                        </tr>
                    </table>                    
                </div>        
            @endif
        </div>
    </main>
</x-app-layout>
