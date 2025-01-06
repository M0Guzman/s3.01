<?php
namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderStateChanged extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Créer une nouvelle instance de la classe OrderStateChanged.
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
        return $this->subject('Changement d\'état de commande')
                    ->view('emails.order_state_changed'); // Vue de l'email
    }
}
