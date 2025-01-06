<x-app-layout>
    @vite(['resources/scss/profile/order_history.scss'])
    <h3><a href="{{route('profile.edit')}}">Mon Compte</a></h3>
    @if($users->id != 1)
        @if ($users->role)  
            {{ $users->role->name }}
        @endif
    @else

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
                    <td>{{ $order->get_price() }}</td>
                    <td>{{ $order->order_state->name }}</td>
                    <td><a href="{{$order->resource->get_url()}}">Facture.pdf</a></td>
                </tr>
                    @foreach ($order->bookings as $booking)
                        <tr>
                                <td> <a href="{{ route('travel.show', ['id' => $booking->id]) }}"> {{ $booking->travel->title }} </a></td>
                                <td> {{ $booking->start_date }} </td>
                                <td>{{ $booking->get_price() }} € </td>
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
    @endif
</x-app-layout>
