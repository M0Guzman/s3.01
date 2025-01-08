<x-dashboard-layout>
  <section class="body_travels">
    <br>
    @vite(['resources/scss/dashboard/service_vente.scss'])
    <h1>Séjours Œnologiques</h1>
    <br>
    <p> Rappel il faut envoyer les mails aux bonnes personnes.</p>
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
                <h1 class="title">Commande de :</h1>
                <h2 class="location">
                  {{ mb_substr($order->user->last_name, 0, 50, 'UTF-8') }}  
                  {{ mb_substr($order->user->first_name, 0, 50, 'UTF-8') }}
                </h2>
                <p class="star">
                  {{ mb_substr($order->user->email, 0, 50, 'UTF-8') }}
                  <strong>{{ mb_substr($order->order_state->name, 0, 50, 'UTF-8') }} </strong>
                </p>

                <!-- Formulaire pour changer l'état et envoyer l'email -->
                <form action="{{ route('order.update', ['id' => $order->id]) }}" method="POST">
                  @csrf
                    <select id="order_state" name="order_state">
                      <option value="" @selected($order_state = "")>Etat Commande</option>
                      @foreach ($order_states as $order_state)
                        <option value="{{ $order_state->name}}" @selected($order_states == $order_state->name)> {{ $order_state->name}}</option>
                      @endforeach
                    </select>
                  <button type="submit" class="discover_Offer_Button">Envoyer les mails et changer l'état</button>
                </form>
              </div>
            </div>
          @endif
        @endforeach
      @endif

</x-dashboard-layout>
