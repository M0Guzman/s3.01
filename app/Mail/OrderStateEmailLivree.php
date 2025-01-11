<?php
namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderStateEmailLivree extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Créer une nouvelle instance de la classe OrderStateEmailLivree.
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
        return $this->subject('Notification de commande - Livree')
                    ->view('mails.order_state_livree');  // Vue spécifique pour Livree
    }
}
