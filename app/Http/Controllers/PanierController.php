<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\ParticipantCategory;
use App\Models\TravelCategory;
use App\Models\TravelHasResource;
use App\Models\VineyardCategory;
use App\Models\Travel;
use App\Models\Order;
use App\Models\Booking_orders;
use Session;
use View;

class PanierController extends Controller
{
    public function show(Request $request) 
    {
        

        
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

    public function addPanier(Request $request)
{        
        $order = null;
        /*$validated = $request->validate([
            'travel_id' => ['required' ,'int',"exists:booking,travel_id"],
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
            $order = Order::create([
                
            ]);
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
            
            $bookingId = ($request->input('booking_id'));
            
           

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
            $order->bookings()->create([
                'travel_id' => $travelId,
                'adult_count' => $adultCount,
                'children_count' => $childCount,
                'room_count' => $roomCount,
                'start_date' => $startDate,
            ]);
        }
            
        return redirect(route('panier.show'));
        }    
        
    
    public function supprimerProduit(Request $request,$booking_id) {
        $order = Order::find(Session::get('order_id'));

        $booking = $order->bookings()->find($booking_id);
        $order->bookings()->detach($booking_id); 
        $booking->delete();
        

        return back()->with('status', 'Article-deleted');
    }
   
}