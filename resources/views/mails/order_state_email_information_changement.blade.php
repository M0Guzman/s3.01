<!DOCTYPE html>
<html>
<head>
    <title>Commande - Information changement</title>
</head>
<body>
    <h1>Bonjour {{ $order->user->first_name }},</h1>
    <p>Votre commande a changé car l'hotel n'étais pas disponible.</p>
    
    @foreach ($order->bookings as $booking_order)
        @if ($booking_order->travel_id != null)
            @foreach ($booking_order->travel->travel_steps as $travelStep)
                @foreach ($travelStep->activities as $activity)
                    @if( $activity->partner->Hotel != null)
                        @php
                            $partner_ok = $activity->partner->name
                        @endphp
                    @endif
                @endforeach
            @endforeach
        @endif
    @endforeach
    <p>Voiçi le nouvel hotel {{ $partner_ok }}</p>
    <p>Merci de votre commande!</p>
</body>
</html>
