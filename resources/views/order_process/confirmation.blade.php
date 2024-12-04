<x-app-layout>
    @vite(['resources/scss/panier.scss', 'resources/js/process_order.js'])
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
                                    <td class="" id="prix">{{ $booking->travel->price_per_person * ( $booking->adult_count + $booking->children_count ) }} € </td>
                                </tr>
                            @endforeach

                            <tr>
                                <td>Prix total</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    {{ $order->bookings->sum(function($booking) { return $booking->travel->price_per_person * ( $booking->adult_count + $booking->children_count ); }) }} €
                                </td>
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
                            <x-payment-radio id="paypal" value="paypal" name="payment">
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
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
