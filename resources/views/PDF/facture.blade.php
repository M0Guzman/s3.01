
@vite(['resources/scss/profile/facture.scss'])

@foreach ($order->bookings as $booking)

<div id="container_global">
    <div id="container_information">
        <h1 >{{ $booking->travel->title }} : {{ $booking->start_date }}</h1>
        <div id="container_chambres">
            <p id="adultes">{{ $booking->adult_count }} adulte(s)</p>
            <p id="enfants">{{ $booking->children_count }} enfant(s)</p>
            <p id="chambres">{{ $booking->room_count }} chambre(s)</p>
        </div>
    </div>
    <h1 id="prix">{{ $booking->get_price() }} €</h1>
</div>
<hr>


@endforeach
