<?php

namespace App\Http\Controllers;
use Session;
use App\Models\Order;
use PDF;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generatePDF()
    {

        $order = Order::find(Session::get('order_id'));

        // Charge une vue Blade dans un PDF
        $pdf = PDF::loadView('PDF.facture', ['order'=>$order]);

        // Retourne le PDF au navigateur
        return $pdf->stream('facture_client.pdf');
    }
}
