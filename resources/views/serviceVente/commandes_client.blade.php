<x-app-layout>
  <section class="body_travels">
      <br>
    @vite(['resources/scss/travels.scss'])
    <div class="filters-container" >

      <h1>Séjours Œnologiques</h1>
      <br>
      <p> Envoyer les amiles au bonne personne.</p>
      <form class="filters" action="#">
        @csrf
        <select id="order_state" name="order_state">
          <option value="" @selected($order_state = "")>Etat Comande</option>
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
        <p>Aucun séjour ne correspond à vos critères.</p>
      @else
      @foreach($orders as $order)
        <div class="cadre">
          <h1 class="price">{{ $order->coupon->value }} € </h1>
          <div class="container_info_sejour">
            <h1 class="title">{{ mb_substr($order->user->first_name, 0, 50, 'UTF-8') }}</h1>
            <div class="container_location_star">
              <h2 class="location">
                {{ mb_substr($order->user->last_name, 0, 50, 'UTF-8') }}
              </h2>
              <p class="star">
                {{ mb_substr($order->user->email, 0, 50, 'UTF-8') }}
              </p>
            </div>
            
            <!-- Formulaire pour changer l'état et envoyer l'email -->
            <form action="{{ route('order.update', ['id' => $order->id]) }}" method="POST">
              @csrf
              <select name="order_state">
                @foreach ($order_states as $order_state)
                  <option value="{{ $order_state->name }}" @selected($order_state->name == $order->orderState->name)>
                    {{ $order_state->name }}
                  </option>
                @endforeach
              </select>
              <button type="submit" class="discover_Offer_Button">Envoyer les mails et changer l'état</button>
            </form>
          </div>
        </div>
      @endforeach

      @endif

</x-app-layout>