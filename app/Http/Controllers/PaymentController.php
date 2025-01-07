<?php

namespace App\Http\Controllers;

use App\Mail\OfferedTravelCodeMail;
use App\Mail\PurchaseCompletedMail;
use App\Models\Order;
use App\Models\Resource;
use App\Providers\RouteServiceProvider;
use \Braintree\Gateway as BraintreeGateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller;
use PDF;
use Srmklive\PayPal\Services\PayPal;

class PaymentController extends Controller
{
    public function process_payment(Request $request, BraintreeGateway $gateway) {
        $request->merge([
            'order_id' => (int) $request->order_id,
        ]);

        $validated = $request->validate([
            'order_id' => ['required', 'int', 'exists:orders,id'],
            'payment_method_nonce' => ['required', 'string']
        ]);

        $order = Order::find($validated['order_id']);

        // validate
        $result = $gateway->transaction()->sale([
            'amount' => $order->get_price(),
            'paymentMethodNonce' => $validated['payment_method_nonce'],
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        if ($result->success || !is_null($result->transaction)) {
            $this->post_payment($order);
            return redirect(route('order.thanks.show'));
        } else {
            $errorString = "";

            foreach($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }

            back()->withErrors($errorString);
        }
    }

    public function create_order(Request $request, Paypal $paypal) {
        if(!$request->has('order_id')) {
            return redirect(RouteServiceProvider::HOME);
        }

        $order = Order::find($request->input('order_id'));

        $paypal->getAccessToken();
        $res = $paypal->createOrder([
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'reference_id' => $order->id,
                    'amount' => [
                        'currency_code' => 'EUR',
                        'value' => strval($order->get_price())
                    ]
                ]
            ],
            'prefer' => 'return=minimal',
        ]);

        return $res;
    }

    public function approve_order(Request $request, Paypal $paypal, $order_id)
    {
        $paypal->getAccessToken();

        $res = $paypal->capturePaymentOrder($order_id, [
            'prefer' => "return=minimal"
        ]);

        if($res["status"] == "COMPLETED") {
            $this->post_payment(Order::find($res['purchase_units'][0]['reference_id']));
        }

        return $res;
    }

    private function post_payment(Order $order) {
        $user = Auth::user();

        foreach($order->bookings as $booking) {
            $offered = $booking->offered_travel;
            if($offered != null) {
                Mail::to($user)->send(new OfferedTravelCodeMail($booking->travel, $offered->code));
            }
        }

        if($order->coupon_id != null) {
            $order->coupon->update([
                'value' => max(0, $order->coupon->value - $order->get_price(true))
            ]);
        }

        $pdf = PDF::loadView('PDF.facture', ['order'=>$order]);

        $file = Resource::create([
            'filename' => 'invoice.pdf',
            'mimetype' => 'application/pdf',
            'permission' => 'user.' . $user->id
        ]);

        Storage::put($file->id, $pdf->stream("invoice.pdf"));

        $order->update([
            'resource_id' => $file->id,
            'order_state_id' => 1,
            'user_id' => $user->id
        ]);

        session()->forget('order_id');
        session()->save();

        Mail::to($user)->send(new PurchaseCompletedMail($order));
    }
}
