<?php
namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderStateEmailEnCoursDeLivraison extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Créer une nouvelle instance de la classe OrderStateEmailEnCoursDeLivraison.
     *
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Construire le message de l'email.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Notification de commande - En cours de livraison')
                    ->view('emails.order_state_en_cours_de_livraison');  // Vue spécifique pour En cours de livraison
    }
}
