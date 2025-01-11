<!DOCTYPE html>
<html>
<head>
    <title>Commande - Livree</title>
</head>
<body>
    <h1>Bonjour {{ $order->user->first_name }},</h1>
    <p>Votre commande a changé d'état à "Livree".</p>
    <br>
    <h2 class="titre_info">Le programme détaillé de votre séjour</h2>
    @foreach ($order->bookings as $booking_order)
        @if ($booking_order->travel_id != null)
            @foreach ($booking_order->$travel->travel_steps as $travelStep)
                <div class="container_etape">
                    <div class="image-section">
                        <img class="img-etape" src="{{ $travelStep->resources[0]->get_url() }}">
                    </div>
                    <div class="info-section">
                        <h3 class="titre-etape">{{ $travelStep->title }}</h3>
                        <p>
                            {{ $travelStep->description }}
                        </p>
                    </div>
                </div>
            @endforeach
            <br>
            <br>
        @endif
    @endforeach
    <p>Merci de votre fin de commande!</p>
</body>
</html>
