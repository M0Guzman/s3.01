<x-dashboard-layout>
  <section class="body_travels">
    <br>
    @vite(['resources/scss/dashboard/service_vente.scss'])
    <div class="filter-container" >
      <form class="filter" action="#">
        @csrf
        <select id="order_state" name="order_state">
          <option value="" @selected($order_state = "")>Etat Commande</option>
          @foreach ($order_states as $order_state)
            <option value="{{ $order_state->name}}" @selected($order_states == $order_state->name)> {{ $order_state->name}}</option>
          @endforeach
        </select>
        <input id="submit" type="submit" value="Recherche">
      </form>
    </div>

    <section id="container_travel">
      @php
        //dd($orders);
      @endphp
      @if($orders->get()->isEmpty())
        <p>Aucun commande ne correspond à vos critères.</p>
      @else
        @foreach($orders->get() as $order)
          @if ($order->user_id != null)
            <div class="cadre">
              @if($order->coupon_id != null)
                <h1 class="price">{{ $order->coupon->value }} € </h1>
              @endif
              <div class="container_info_comande">
                <h1 class="title">
                  Commande N° {{$order->id}}
                  <br>
                  <strong>{{ $order->order_state->name}} </strong> de :
                </h1>
                <h2 class="location">
                  {{ mb_substr($order->user->last_name, 0, 50, 'UTF-8') }}  
                  {{ mb_substr($order->user->first_name, 0, 50, 'UTF-8') }}
                </h2>
                <p class="star">
                  {{ mb_substr($order->user->email, 0, 50, 'UTF-8') }}
                </p>

                <!-- Formulaire pour changer l'état et envoyer l'email -->
                <h3>Partner Hotel</h3>
                @foreach ($order->bookings as $booking_order)
                  @if ($booking_order->travel_id != null)
                    @foreach ($booking_order->travel->travel_steps as $travelStep)
                      @foreach ($travelStep->activities as $activity)
                        @if( $activity->partner->Hotel != null)
                          <div class="container_etape">
                            <p> mail partenaire {{ $activity->partner->name }} : {{ $activity->partner->email }}</p>
                          </div>
                        @endif
                      @endforeach
                    @endforeach
                  @endif
                @endforeach
                <br>
                <h3>Partner cave et autre</h3>
                @foreach ($order->bookings as $booking_order)
                  @if ($booking_order->travel_id != null)
                    @foreach ($booking_order->travel->travel_steps as $travelStep)
                      @foreach ($travelStep->activities as $activity)
                        @if( $activity->partner->winecellar != null || $activity->partner->restaurant != null || $activity->partner->OtherPartner != null)
                          <div class="container_etape">
                            <p> mail partenaire {{ $activity->partner->name }} : {{ $activity->partner->email }}</p>
                          </div>
                        @endif
                      @endforeach
                    @endforeach
                  @endif
                @endforeach
                <br>
                
                @if ($order->order_state->name != 'Livree' && $order->order_state->name != 'Annule')
                  <form action="{{ route('order.update', ['id' => $order->id]) }}" method="POST">
                    @csrf
                      @if ($order->order_state->name == 'En attente')
                        <p>Hotel informer</p>
                        <input type="checkbox" name="informer_hotel" >
                        <p>Hotel répondant positivement</p>
                        <input type="checkbox" name="hotel_positif" >
                        <select id="hotels" name="hotel_id">
                          <option value="" @selected($hotel = "")>Etat Commande</option>
                          @foreach ($hotels as $hotel)
                            <option value="{{ $hotel->partner_id}}" @selected($hotel->id == $hotel->partner_id)> {{ $hotel->partner->name}}</option>
                          @endforeach
                        </select>
                      @elseif ($order->order_state->name == 'En cours de livraison')
                        <p>L'utilisateur a finaliser le payement de la commande</p>
                        <input type="checkbox" name="comande_finaliser" >
                        <p>L'utilisateur a annuler la commande</p>
                        <input type="checkbox" name="comande_annuler" >
                      @endif
                      <input type="hidden" value="{{$order->id}}" name="order_id"/>
                    <button type="submit" class="discover_Oder_Button">Envoyer les mails et changer l'état</button>
                  </form>
                @else
                  <h3 class="discover_Oder_Button">Rien à faire</>
                @endif
                
              </div>
            </div>
          @endif
        @endforeach
      @endif

</x-dashboard-layout>
