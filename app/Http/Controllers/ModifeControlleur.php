<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Travel;
use App\Models\Order;
use App\Models\TravelStep;
use App\Models\Activity;
use App\Models\Partner;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

use Session;
use View;

class ModifeControlleur extends Controller
{
    public function show(Request $request) 
    {
        if(!$request->has('travel_id') && !$request->has('booking_id'))
            return redirect(RouteServiceProvider::HOME);

        $travel = null;
        $booking = null;

        if( $request->has('reserve')){
            $reserve = $request->get('reserve');
            
        }

        if($request->has('travel_id') )
        {
            $travel = Travel::find($request->input('travel_id'));
        }
        
        
        if($request->has('booking_id'))
        {
            $booking = Booking::find($request->input('booking_id'));
            $travel = $booking->travel;
        }            
        if($request->has('etat'))
        {        
            if( $request->get('etat') == 'add')
            
                $etat = $request->session()->put('etat','add');
            
            if($request->get('etat') == 'offre')
                $etat = $request->session()->put('etat','offre');
        }
        return view("modife", ['booking'=>$booking, 'travel'=>$travel, 'etat'=>$etat]);

    }

}