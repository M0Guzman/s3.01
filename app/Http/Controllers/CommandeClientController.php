<?php

namespace App\Http\Controllers;

use App\Models\ParticipantCategory;
use Illuminate\Http\Request;
use App\Models\Travel;
use App\Models\TravelCategory;
use App\Models\VineyardCategory;
use Illuminate\Support\Facades\Mail; // Pour envoyer des emails
use App\Mail\OrderStateChanged; // Crée une classe Mailable pour l'email
use App\Models\Order;
use App\Models\OrderState;
use App\Mail\OrderStateEmailEnAttente; // Exemple de classe Mailable pour un état
use App\Mail\OrderStateEmailEnCoursDeLivraison; // Exemple d'une autre classe Mailable pour un autre état
use App\Mail\OrderStateEmailLivree; // Exemple de classe Mailable pour un état
use App\Mail\OrderStateEmailAnnule; // Exemple d'une autre classe Mailable pour un autre état

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
        return view('serviceVente.commandes_client', [
            'order_state' => $request->input('order_state'),
            'order_states' => OrderState::all(),
            'orders' => $orders
        ]);
    }

    public function show_single($id, Request $request)
    {
        // Récupère l'ordre spécifique
        $order = Order::find($id);

        // Retourne la vue pour cet ordre spécifique
        return view('serviceVente.commande_client', ['order' => $order]);
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

        // Change l'état de la commande si un nouvel état est sélectionné
        if ($request->has('order_state') && $request->input('order_state') != '') {
            $orderstate = OrderState::where('name', $request->input('order_state'))->first();
            if ($orderstate) {
                $order->order_state_id = $orderstate->id;
                $order->save();  // Enregistre l'état mis à jour dans la base de données
            }
        }

        // Envoie l'email en fonction de l'état de la commande
        if ($order->orderState->name == 'En attente') {
            Mail::to($order->user->email)->send(new OrderStateEmailEnAttente($order));  // Email pour "En attente"
        } elseif ($order->orderState->name == 'En cours de livraison') {
            Mail::to($order->user->email)->send(new OrderStateEmailEnCoursDeLivraison($order));  // Email pour "En cours de livraison"
        } elseif ($order->orderState->name == 'Livree') {
            Mail::to($order->user->email)->send(new OrderStateEmailLivree($order));  // Email pour "Livree"
        } elseif ($order->orderState->name == 'Annule') {
            Mail::to($order->user->email)->send(new OrderStateEmailAnnule($order));  // Email pour "Annule"
        } else {
            // Email par défaut si aucun état particulier n'est spécifié
            Mail::to($order->user->email)->send(new OrderStateChanged($order));  // Email générique
        }

        // Redirige avec un message de succès
        return redirect()->route('commande_client.index')->with('success', 'L\'état de la commande a été mis à jour et un email a été envoyé.');
    }
}