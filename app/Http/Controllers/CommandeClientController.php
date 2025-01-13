<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; // Pour envoyer des emails
use Illuminate\Routing\Controller;
use App\Models\Order;
use App\Models\OrderState;
use App\Models\Hotel;
use App\Models\Coupon;
use Str;
use App\Mail\OrderStateChanged; // Crée une classe Mailable pour l'email
use App\Mail\OrderStateEmailEnCoursDeLivraison; 
use App\Mail\OrderStateEmailLivree;
use App\Mail\OrderStateEmailAnnule; 
use App\Mail\OrderStateEmailInformationChangement; 
use App\Mail\OrderStateEmailDemandeDisponibilite; 
use App\Mail\OrderStateEmailInformeReservation; 
use App\Mail\OrderStateEmailAnullerReservation;

use View;
use Carbon\Carbon;

class CommandeClientController extends Controller
{
    public function show(Request $request)
    {
        // Initialise la requête de base
        $orders = Order::query();

        // Vérifie si un état de commande est spécifié
        if ($request->has('order_state') && $request->input('order_state') != '') {
            // Récupère l'état de commande correspondant au nom
            $orderstate = OrderState::where('name', '=', $request->input('order_state'))->first();

            // Si l'état de commande existe, applique la condition
            if ($orderstate) {
                $orders = $orders->where('order_state_id', '=', $orderstate->id);
            }
        }

        // Retourne la vue avec les commandes filtrées
        return view('dashboard.commandes_client', [
            'order_state' => $request->input('order_state'),
            'order_states' => OrderState::all(),
            'hotels' => Hotel::all(),
            'orders' => $orders->limit(10)//->offset(page * 10)->get()
        ]);
    }

    public function show_single($id, Request $request)
    {
        // Récupère l'ordre spécifique
        $order = Order::find($id);

        // Retourne la vue pour cet ordre spécifique
        return view('dashboard.commande_client', ['order' => $order]);
    }

    // Méthode pour traiter la mise à jour de l'état de la commande et envoyer un email
    public function updateOrder($id, Request $request)
    {
        // Récupère la commande par son ID
        $order = Order::find($id);
        // Vérifie si l'ordre existe
        if (!$order) {
            return redirect()->route('commande_client.index')->with('error', 'Commande non trouvée');
        }

        

        // Envoie l'email en fonction de l'état de la commande
        if ($order->order_state->name == 'En attente') {
            if ($request->input("informer_hotel")){
                if ($request->input("hotel_positif")){
                    Mail::to($order->user->email)->send(new OrderStateEmailEnCoursDeLivraison($order));  // Email pour "En attente"
                    $order->order_state_id = 2;
                    $order->save();
                } else {
                    Mail::to($order->user->email)->send(new OrderStateEmailInformationChangement($order));  // Email pour "En attente"
                    foreach ($order->bookings as $booking_order){
                        if ($booking_order->travel_id != null) {
                            foreach ($booking_order->travel->travel_steps as $travelStep) {
                                foreach ($travelStep->activities as $activity){
                                    if( $activity->partner->hotel != null) {
                                        Mail::to($activity->partner->email)->send(new OrderStateEmailDemandeDisponibilite($activity));  // Email pour "En attente"
                                        //valier hotel
                                        $validated = $request->validate([
                                            'hotel_id' => ['int',"exists:hotels,partner_id"]
                                        ]);
                                        // Récupère la'hotel par son ID
                                        $hotel = Hotel::find($validated['hotel_id']);
                                        $activity->partner->hotel_id = $hotel;
                                        $order->save();
                                    }
                                }
                            }
                        }
                    }
                }
            } else {
                foreach ($order->bookings as $booking_order){
                    if ($booking_order->travel_id != null) {
                        foreach ($booking_order->travel->travel_steps as $travelStep) {
                            foreach ($travelStep->activities as $activity){
                                if( $activity->partner->hotel != null) {
                                    Mail::to($activity->partner->email)->send(new OrderStateEmailDemandeDisponibilite($activity));  // Email pour "En attente"
                                }
                            }
                        }
                    }
                }
            }
        } elseif ($order->order_state->name == 'En cours de livraison') {
            if ($request->input("commande_finaliser")){
                foreach ($order->bookings as $booking_order){
                    if ($booking_order->travel_id != null) {
                        foreach ($booking_order->travel->travel_steps as $travelStep) {
                            foreach ($travelStep->activities as $activity){
                                if( $activity->partner->hotel != null || $activity->partner->winecellar != null || $activity->partner->restaurant != null || $activity->partner->OtherPartner != null) {
                                    Mail::to($activity->partner->email)->send(new OrderStateEmailInformeReservation($activity));  // Email pour "En attente"
                                }
                            }
                        }
                    }
                }
                Mail::to($order->user->email)->send(new OrderStateEmailLivree($order));  // Email pour user "Livraison"
                $order->order_state_id = 3;
                $order->save();
            } elseif ($request->input("commande_annuler")) {
                foreach ($order->bookings as $booking_order){
                    if ($booking_order->travel_id != null) {
                        foreach ($booking_order->travel->travel_steps as $travelStep) {
                            foreach ($travelStep->activities as $activity){
                                if( $activity->partner->hotel != null) {
                                    Mail::to($activity->partner->email)->send(new OrderStateEmailAnullerReservation($activity));  // Email pour "En attente"
                                }
                            }
                        }
                    }
                }
                $prix = $order->get_price();
                $coupon = Coupon::create([
                    'code' => Str::random(),
                    'value' => $prix,
                    'expiration_date' => fake()->dateTimeBetween('13-06-2025','13-06-2026')
                ]);

                Mail::to($order->user->email)->send(new OrderStateEmailAnnule($order));  // Email pour user "Annule"
                $order->order_state_id = 4;
                $order->coupon_id = $coupon->id;
                $order->save();
            }
            
        }
        else {
            // Email par défaut si un truc bizzar arive
            Mail::to($order->user->email)->send(new OrderStateChanged($order));  // Email générique
        }

        // Redirige avec un message de succès
        return redirect()->route('commandes_client.show')->with('success', 'L\'état de la commande a été mis à jour et un email a été envoyé.');
    }
}
