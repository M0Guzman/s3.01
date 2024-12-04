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
        if(!$request->has('id'))
            return redirect(RouteServiceProvider::HOME);
        
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

        

        $order->bookings()->create([
            'travel_id' => $request->input('id'),
        ]);
        
        return view('panier', ['order' => $order]);
    }
    
}