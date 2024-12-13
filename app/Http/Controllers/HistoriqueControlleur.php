<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Order;
use Session;
use View;

class HistoriqueControlleur extends Controller
{
    public function show(Request $request)
    {
        
        $orders = Order::where('user_id','=',$request->user()->id)->get();
        
        $orders = $orders->sortBy(function ($order, int $key) {
            return Carbon::parse($order->bookings[0]['start_date'])->timestamp;
        });
        
        return view('profile/historique', ['orders' => $orders]);
    }
}