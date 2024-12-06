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
        dd($request->has('booking_id'));
        //$etat = $request->input('etat');
        //dd($request->input('travel_id'));
    if($request->has('booking_id'))  
        $order->bookings()->find($request->input('booking_id'))->update([
            'adult_count' => $request->input('adults'),
            'children_count' => $request->input('children'),
            'room_count' => $request->input('room'),
            'start_date' => $request->input('dateInput'),
        ]);

    else
        $order->bookings()->create([
            'travel_id' => $request->query('id'),
            'adult_count' => $request->query('adults'),
            'children_count' => $request->query('children'),
            'room_count' => $request->query('room'),
            'start_date' => $request->input('dateInput'),
        ]);
    
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