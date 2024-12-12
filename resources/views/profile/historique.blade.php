<!DOCTYPE html>
<html lang="fr">
    @vite(['resources/scss/historique.scss'])
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vino</title>
</head>
<body>
    <table>
        <th>Nom sejour</th>
        <th>Date</th>
        <th>Prix Total</th>
        <th>Etat</th>
        <th>Facture</th> 
        @foreach ($orders as $order)
            @foreach ($order->bookings as $booking)
                <tr>
                    <td> {{$booking->travel->name }} </td>
                    <td> {{$booking->travel->start_date}} </td>
                    <td>{{ $booking->travel->price }} </td>
                    <td>{{$order->order_states->name}} </td>
                    <td> </td>
                </tr>

            @endforeach   
        @endforeach 
    </table>
</body>
</html>