<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\ParticipantCategory;
use App\Models\TravelCategory;
use App\Models\TravelHasResource;
use App\Models\VineyardCategory;
use App\Models\Travel;
use App\Models\Order;
use Session;
use View;

class PanierController extends Controller
{
    public function show(Request $request) 
    {
        

        Session::remove('order_id');
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
    
}