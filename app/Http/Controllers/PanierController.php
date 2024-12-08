<?php

namespace App\Http\Controllers;

use App\Mail\PurchaseCompletedMail;
use App\Models\Address;
use App\Models\City;
use App\Models\Department;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\ParticipantCategory;
use App\Models\TravelCategory;
use App\Models\TravelHasResource;
use App\Models\VineyardCategory;
use App\Models\Travel;
use App\Models\Order;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Session;
use View;

class PanierController extends Controller
{
    public function show(Request $request)
    {
        Session::put('order_id', 2);
        $order = null;

        if(Session::has('order_id'))
        {
            $order = Order::find(Session::get('order_id'));
        }
        else {
            $order = Order::create([

            ]);
            Session::put('order_id',$order->id);
        }


        return view('panier', ['order' => $order]);
    }

    public function show_address(Request $request)
    {
        if(!Session::has('order_id') || ($order = Order::find(Session::get('order_id'))) && $order->bookings->count() == 0) return redirect(route('order.show'));


        return view('order_process.address', [
            'departments' => Department::all()
        ]);
    }

    public function process_address(Request $request)
    {
        if(!Session::has('order_id') || ($order = Order::find(Session::get('order_id'))) && $order->bookings->count() == 0) return redirect(route('order.show'));

        $address_id = 0;

        if(!$request->has('address') || $request->input('address') == '') {
            $validated = $request->validate([
                'address_name' => ['required', 'string', 'max:255'],
                'address_street' => ['required','string','max:255'],
                'address_city' => ['required','string','max:255'],
                'address_zip' => ['required','string','max:5'],
                'address_department' => ['required','int',"exists:departments,id"],
                'address_phone' => ['required','string', 'max:10']
            ]);


            $user_id = $request->user()->id;

            $city=City::where('name','=',$validated['address_city'])->where('zip', '=', $validated['address_zip'])->first();
            if($city == null) {
                $city = City::create([
                    'name' => $validated['address_city'],
                    'zip' => $validated['address_zip'],
                    'department_id' => $validated['address_department'],
                ]);
            }

            $address_id = $request->user()->addresses()->create([
                'name' => $validated['address_name'],
                'phone' => $validated['address_phone'],
                'street' => $validated['address_street'],
                'city_id' => $city->id,
            ])->id;
        } else {
            $validated = $request->validate([
                'address' => ['required','int',"exists:addresses,id"],
            ]);

            $address_id = $validated['address'];
        }

        Session::put('order_address', $address_id);
        return redirect(route('order.process.agreements.show'));
    }

    public function show_agreements(Request $request)
    {
        if(!Session::has('order_id') || ($order = Order::find(Session::get('order_id'))) && $order->bookings->count() == 0)
            return redirect(route('order.show'));
        if(!Session::has('order_address') || !$request->user()->addresses->contains(Session::get('order_address')))
            return redirect(route('order.process.address.show'));

        return view('order_process.agreements');
    }

    public function process_agreements(Request $request)
    {
        if(!Session::has('order_id') || ($order = Order::find(Session::get('order_id'))) && $order->bookings->count() == 0)
            return redirect(route('order.show'));
        if(!Session::has('order_address') || !$request->user()->addresses->contains(Session::get('order_address')))
            return redirect(route('order.process.address.show'));

        $validated = $request->validate([
            'agree_cgv' => ['required', 'string', 'in:on'],
            'agree_cpv' => ['required','string', 'in:on'],
        ]);

        return redirect(route('order.process.confirmation.show'));
    }

    public function show_confirmation(Request $request)
    {
        if(!Session::has('order_id') || ($order = Order::find(Session::get('order_id'))) && $order->bookings->count() == 0)
            return redirect(route('order.show'));
        if(!Session::has('order_address') || !$request->user()->addresses->contains(Session::get('order_address')))
            return redirect(route('order.process.address.show'));

        $address = Address::find(Session::get('order_address'));

        return view('order_process.confirmation', [
            'order' => $order,
            'address' => $address
        ]);
    }

    public function create_order(Request $request) {
        if(!$request->has('order_id')) {
            return redirect(RouteServiceProvider::HOME);
        }

        $order = Order::find($request->input('order_id'));

        $provider = app(PayPalClient::class);
        $provider->getAccessToken();
        $res = $provider->createOrder([
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => 'EUR',
                        'value' => strval($order->bookings->sum(function($booking) { return $booking->travel->price_per_person * ( $booking->adult_count + $booking->children_count); }))
                    ]
                ]
            ],
            'prefer' => 'return=minimal'
        ]);

        if($res["status"] == "COMPLETED") {
            Mail::to($request->user()->mail)->send(new PurchaseCompletedMail());
        }

        return $res;
    }

    public function approve_order(Request $request, $order_id)
    {
        $provider = app(PayPalClient::class);
        $provider->getAccessToken();

        return $provider->capturePaymentOrder($order_id, [
            'prefer' => "return=minimal"
        ]);
    }

    public function show_thanks() {
        return view('order_process.thanks');
    }
}
