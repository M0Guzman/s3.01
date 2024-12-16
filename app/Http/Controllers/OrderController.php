<?php

namespace App\Http\Controllers;

use App\Mail\OfferedTravelCodeMail;
use App\Mail\PurchaseCompletedMail;
use App\Models\Address;
use App\Models\City;
use App\Models\Department;
use App\Models\Booking;
use App\Models\OfferedTravel;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Travel;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
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
            'action' => ['string', 'in:gift,for_me,edit']
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

    public function show_facture(Request $request) 
    {
        $order = Order::find(Session::get('order_id'));
        return view('PDF.facture', ['order'=>$order]);
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
        $units = [];

        foreach($order->bookings as $booking) {
            array_push($units, [
                'reference_id' => strval($booking->id),
                'amount' => [
                    'currency_code' => 'EUR',
                    'value' => strval($booking->travel->price_per_person * ( $booking->adult_count + $booking->children_count))
                ]
            ]);
        }

        $provider = app(PayPalClient::class);
        $provider->getAccessToken();
        $res = $provider->createOrder([
            'intent' => 'CAPTURE',
            'purchase_units' => $units,
            'prefer' => 'return=minimal'
        ]);


        return $res;
    }

    public function approve_order(Request $request, $order_id)
    {
        $provider = app(PayPalClient::class);
        $provider->getAccessToken();

        $res = $provider->capturePaymentOrder($order_id, [
            'prefer' => "return=minimal"
        ]);

        if($res["status"] == "COMPLETED") {
            Mail::to($request->user())->send(new PurchaseCompletedMail());
            foreach($res['purchase_units'] as $unit) {
                $booking_id = intval($unit['reference_id']);

                $offered = OfferedTravel::find($booking_id);
                if($offered != null) {
                    Mail::to($request->user())->send(new OfferedTravelCodeMail($offered->booking->travel, $offered->code));
                }
            }
        }

        return $res;
    }

    public function show_thanks() {
        return view('order_process.thanks');
    }

    public function update_booking(Request $request)
    {
        $order = null;
        /*$validated = $request->validate([
            'travel_id' => ['required' ,'int',"exists:bookings,travel_id"],
            'booking_id' => ['int','exists:booking,id'],
            'adult_count' => ['required','int','exists:booking,adult_count'],
            'children_count'=>['required','int','exists:booking,children_count'],
            'room_count' => ['required','int','exists:booking,children_count'],
            'start_date' => ['required','int','exists:booking,start_date'],
        ]);*/

        if(Session::has('order_id'))
        {
            $order = Order::find(Session::get('order_id'));
        }
        if($order == null)
        {
            $order = Order::create([]);
            Session::put('order_id',$order->id);
        }

        $bookingId = $request->input('booking_id');
        $travelId = $request->input('travel_id');

        $adultCount = $request->input('adults', 1);
        $childCount = $request->input('children', 0);
        $roomCount = $request->input('room', 1);
        $startDate = $request->input('dateInput');

        if($request->has('booking_id') && $request->input('booking_id') != '')
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

            if($request->has('action') && $request->input('action') == 'gift') {
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

        return view('profile/order_history', ['orders' => $orders]);
    }
}
