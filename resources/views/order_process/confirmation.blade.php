<x-app-layout>
    @vite(['resources/js/process_order.js'])
    <link
      rel="stylesheet"
      type="text/css"
      href="https://www.paypalobjects.com/webstatic/en_US/developer/docs/css/cardfields.css"
    />
    <main class="body">
        <div class="commande-container">
            <h1 class="commande-title">CONFIRMATION DE LA COMMANDE</h1>
            <nav class="commande-nav">
                <ul>
                    <li>Panier</li>
                    <li>Identifiez-vous</li>
                    <li>Adresse</li>
                    <li>CGV / CPV</li>
                    <li class="active">Confirmation</li>
                </ul>
            </nav>

                <div class="flex flex-row gap-6 mx-15 sm:justify-center items-center sm:pt-0 bg-gray-100 dark:bg-gray-900">
                    <div class="w-full mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                        <div class="text-lg">Récapitulatif du panier</div>
                        <table class="table-auto">
                            <tr>
                                <th class="p-4">Nom du Sejour</th>
                                <th class="p-4">Date du sejour</th>
                                <th class="p-4">Nombre d'adulte(s)</th>
                                <th class="p-4">Nombre d'enfant(s)</th>
                                <th class="p-4">Prix</th>
                            <tr>


                            @foreach ($order->bookings as $booking)
                                <tr>
                                    <td class="" id="title">{{ $booking->travel->title}}</td>
                                    <td class="" id="date">{{ Carbon\Carbon::createFromFormat('Y-m-d',$booking->start_date)->format('d/m/Y') }}</td>
                                    <td class="" id="adultes">{{ $booking->adult_count }} adulte(s)</td>
                                    <td class="" id="enfants">{{ $booking->children_count }} enfant(s)</td>
                                    <td class="" id="prix">{{ $booking->get_price() }} € </td>
                                </tr>
                            @endforeach
                            <tr>

                            <td>Bon de réduction:</td>
                            <td>
                                <form action="{{ route('order.process.confirmation.show')}}">
                                    <input type="text" name="code" value="{{ $order->coupon == null ? "" : $order->coupon->code }}" />
                                </form>
                            </td>
                            <td></td>
                            <td></td>

                            <td>{{ $order->coupon == null ? 0 : (- min($order->coupon->value, $order->get_price(true))) }} €</td>

                        </tr>
                            <tr>
                                <td>Prix total</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>{{ $order->get_price() }} €</td>
                            </tr>
                        </table>
                    </div>

                    <div class="w-full mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                        <div class="text-lg mb-4">Adresse de facturation</div>
                        <table class="table-auto">
                            <tr>
                                <td>Rue</td>
                                <td>{{ $address->street }}</td>
                            </tr>
                            <tr>
                                <td>Ville</td>
                                <td>{{ $address->city->name }}</td>
                            </tr>
                            <tr>
                                <td>Code postale</td>
                                <td>{{ $address->city->zip }}</td>
                            </tr>
                            <tr>
                                <td>Département</td>
                                <td>{{ $address->city->department->name }}</td>
                            </tr>
                        </table>
                </div>
            </div>

            <div class="flex flex-column sm:justify-center items-center sm:pt-0 bg-gray-100 dark:bg-gray-900">
                <div class="w-full mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                    <div class="text-lg">Choisir un mode de payement</div>

                    <fieldset class="flex flex-row flex-wrap justify-center gap-5">
                        <div class="flex gap-10 justify-center flex-wrap mt-4">
                            <x-payment-radio id="paypal-radio" value="paypal" name="payment">
                                <img src="{{ Vite::asset('resources/images/paypal.svg') }}" alt="Logo Paypal">
                            </x-payment-radio>
                        </div>

                        <div class="flex gap-10 justify-center flex-wrap mt-4">
                            <x-payment-radio id="cb" value="cb" name="payment">
                                <img src="{{ Vite::asset('resources/images/visa.svg') }}" alt="Logo Paypal">
                            </x-payment-radio>
                        </div>

                        <div class="flex gap-10 justify-center flex-wrap mt-4">
                            <x-payment-radio id="stripe" value="stripe" name="payment">
                                <img src="{{ Vite::asset('resources/images/stripe.svg') }}" alt="Logo Paypal">
                            </x-payment-radio>
                        </div>
                    </fieldset>

                    <div class="flex mt-8 justify-center mx-5">
                     <div id="paypal-button-container"></div>

        <p id="result-message"></p>
                    </div>
                </div>
            </div>
        </div>
    </main>

<script src="https://sandbox.paypal.com/sdk/js?client-id=AYbkPvSnWUI5dqFNdXXwVykwE3jzr7gN9BNbQXgKfIl6mWqEz7wEit-O6XXVDvyRkVAc2IAU7rKQxPhS&buyer-country=FR&currency=EUR&components=buttons&disable-funding=venmo,paylater,card"></script>

    <script defer>
window.paypal
    .Buttons({
        style: {
            shape: "rect",
            layout: "vertical",
            color: "gold",
            label: "paypal",
        },
        message: {
            amount: 100,
        } ,

        async createOrder() {
            try {
                const response = await fetch("{{ route('order.create') }}", {
                    method: "post",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    // use the "body" param to optionally pass additional order information
                    // like product ids and quantities
                    body: JSON.stringify({
                        "_token": "{{ csrf_token() }}",
                        "order_id": {{ $order->id }}
                    }),
                });

                const orderData = await response.json();

                if (orderData.id) {
                    return orderData.id;
                }
                const errorDetail = orderData?.details?.[0];
                const errorMessage = errorDetail
                    ? `${errorDetail.issue} ${errorDetail.description} (${orderData.debug_id})`
                    : JSON.stringify(orderData);

                throw new Error(errorMessage);
            } catch (error) {
                console.error(error);
                // resultMessage(`Could not initiate PayPal Checkout...<br><br>${error}`);
            }
        } ,

        async onApprove(data, actions) {
            try {
                const response = await fetch(`{{ route('order.approve', ['order_id' => "orderID"]) }}`.replace('orderID', data.orderID),
                    {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify({
                            "_token": "{{ csrf_token() }}",
                        })
                    }
                );

                const orderData = await response.json();
                const errorDetail = orderData?.details?.[0];

                if (errorDetail?.issue === "INSTRUMENT_DECLINED") {
                    return actions.restart();
                } else if (errorDetail) {
                    throw new Error(
                        `${errorDetail.description} (${orderData.debug_id})`
                    );
                } else if (!orderData.purchase_units) {
                    throw new Error(JSON.stringify(orderData));
                } else {
                    // (3) Successful transaction -> Show confirmation or thank you message
                    // Or go to another URL:  actions redirect thank_you.html ;
                    const transaction =
                        orderData?.purchase_units?.[0]?.payments
                            ?.captures?.[0] ||
                        orderData?.purchase_units?.[0]?.payments
                            ?.authorizations?.[0];
                    console.log(
                        "Capture result",
                        orderData,
                        JSON.stringify(orderData, null, 2)
                    );

                    actions.redirect('{{ route('order.thanks.show') }}');
                }
            } catch (error) {
                console.error(error);
                resultMessage(
                    `Sorry, your transaction could not be processed...<br><br>${error}`
                );
            }
        } ,
    })
    .render("#paypal-button-container");
    </script>
</x-app-layout>
