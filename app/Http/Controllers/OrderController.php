<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\City;
use App\Models\Coupon;
use App\Models\Department;
use App\Models\Booking;
use App\Models\OfferedTravel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Travel;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller;
use Validator;
use \Braintree\Gateway as BraintreeGateway;
use Session;

class OrderController extends Controller
{
    public function show(Request $request)
    {
        $order = null;


        if(Session::has('order_id'))
        {
            $order = Order::find(Session::get('order_id'));
        }
        else {
            $order = Order::create([]);
            Session::put('order_id',$order->id);
        }

        return view('order', ['order' => $order]);
    }
    public function edit(Request $request, $id)
    {
        $validated = $request->validate([
            'booking_id' => ['int', 'exists:bookings,id'],
            'action' => ['required','string', 'in:gift,for_me,edit']
        ]);

        $travel = Travel::find($id);
        if($travel == null) {
            return back();
        }

        $booking = null;

        if($request->has('booking_id'))
        {
            $booking = Booking::find($validated['booking_id']);
        }

        return view("travels.edit", [
            'booking' => $booking,
            'travel' => $travel,
            'action' => $validated['action']
        ]);
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

    public function show_confirmation(Request $request, BraintreeGateway $gateway)
    {
        if(!Session::has('order_id') || ($order = Order::find(Session::get('order_id'))) && $order->bookings->count() == 0)
            return redirect(route('order.show'));
        if(!Session::has('order_address') || !$request->user()->addresses->contains(Session::get('order_address')))
            return redirect(route('order.process.address.show'));

        $address = Address::find(Session::get('order_address'));

        if($request->has('code') && $request->input('code') != '') {
            $coupon = Coupon::where('code', '=', $request->input('code'))->where('value', '>', '0')->first();
            $order->update([
                'coupon_id' => $coupon == null ? null : $coupon->id
            ]);
        }

        $client_token = $gateway->clientToken()->generate([
            'customerId' => $request->user()->braintree_customer_id
        ]);

        return view('order_process.confirmation', [
            'order' => $order,
            'address' => $address,
            'client_token' => $client_token
        ]);
    }


    public function show_thanks() {
        return view('order_process.thanks');
    }

    public function update_booking(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'travel_id' => ['required' ,'int',"exists:travel,id"],
            'booking_id' => ['nullable', 'int', 'exists:bookings,id'],
            'adult_count' => ['required','integer','min:1'],
            'children_count'=>['required','integer','min:0'],
            'room_count' => ['required','integer','min:'. floor($request->input('adult_count') / 2) ],
            'start_date' => ['required','date_format:Y-m-d','after:' . Carbon::today()->format("Y-m-d")],
            'action' => ['required', 'in:gift,for_me,edit']
            // ATTENTION FORMAT Français
        ]);

        if ($validator->fails())
        {
            $errors = $validator->errors();
            //dd($request->input('travel_id'));
            //dd($errors);
            //return redirect(RouteServiceProvider::HOME);
        }

        //dd($validator->validate());
        $validated = $validator->validate();
        $order = null;

        if(Session::has('order_id'))
        {
            $order = Order::find(Session::get('order_id'));
        }
        if($order == null)
        {
            $order = Order::create([]);
            Session::put('order_id',$order->id);
        }


        $travelId = $validated['travel_id'];
        $bookingId = $validated['booking_id'];

        $adultCount = $validated['adult_count'];
        $childCount = $validated['children_count'];
        $roomCount = $validated['room_count'];
        $startDate = $validated['start_date'];

        if($validated['action'] == 'edit' && $validated['booking_id'] != null)
        {
            $booking = $order->bookings()->find($bookingId);
            if($booking != null)
            {
                $booking->update([
                    'adult_count' => $adultCount,
                    'children_count' => $childCount,
                    'room_count' => $roomCount,
                    'start_date' => $startDate,
                ]);
            }
        }
        else
        {
            $booking = $order->bookings()->create([
                'travel_id' => $travelId,
                'adult_count' => $adultCount,
                'children_count' => $childCount,
                'room_count' => $roomCount,
                'start_date' => $startDate,
            ]);

            if($validated['action'] == 'gift') {
                OfferedTravel::create([
                    'booking_id' => $booking->id,
                    'code' => Str::random(16)
                ]);
            }
        }

        return redirect(route('order.show'));
    }


    public function remove_booking(Request $request) {
        $validated = $request->validate([
            'booking_id' => ['required' ,'int',"exists:bookings,id"],
        ]);


        $order = Order::find(Session::get('order_id'));

        $booking = $order->bookings()->find($validated['booking_id']);
        if($booking->offeredTravel != null)
        {
            $booking->offeredTravel()->delete();
        }

        $order->bookings()->detach($validated['booking_id']);
        $booking->delete();

        return back()->with('status', 'Article-deleted');
    }
    public function show_history(Request $request)
    {
        $orders = Order::where('user_id', '=', $request->user()->id)->get();

        $orders = $orders->sortBy(function ($order, int $key) {
            return Carbon::parse($order->bookings[0]['start_date'])->timestamp;
        });
        $users = $request->user();


        return view('profile/order_history', ['orders' => $orders,'users' => $users]);
    }
}
