<x-app-layout>
    @vite(['resources/scss/historique.scss'])
<body>
    <h3><a href="{{route('profile.edit')}}">Mon Compte</a></h3>
    <table>
        <th>Nom sejour</th>
        <th>Date</th>
        <th>Prix Total</th>
        <th>Etat</th>
        <th>Facture</th>
        
        @if($orders != null && $orders !='')
        
            @foreach ($orders as $order)
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>{{ $order->order_state->name }}</td>
                <td>facture</td>
            </tr>
                @foreach ($order->bookings as $booking)
                    <tr>       
                            <td> <a href="{{ route('travel.show', ['id' => $booking->id]) }}"> {{ $booking->travel->title }} </a></td>
                            <td> {{ $booking->start_date }} </td>
                            <td>{{ $booking->travel->price_per_person * ($booking->adult_count + $booking->children_count) }} € </td>
                            <td></td>              
                            <td></td>
                    </tr>    
                @endforeach
                
                <tr id="black">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach
            
        @endif
    </table>
</body>
</x-app-layout>