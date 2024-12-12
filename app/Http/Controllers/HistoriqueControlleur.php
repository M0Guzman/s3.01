<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Session;
use View;

class HistoriqueControlleur extends Controller
{
    public function show()
    {
        $orders = Order::find(Session::get('order_id'));
        $orders = Order::where('order_state_id', '!=', '0')->get();
        //dd($order);
        return view('profile/historique', ['orders' => $orders]);
    }
}