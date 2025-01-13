<?php
namespace App\Mail;

use App\Models\Activity;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderStateEmailAnullerReservation extends Mailable
{
    use Queueable, SerializesModels;

    public $activity;

    /**
     * Créer une nouvelle instance de la classe OrderStateEmailAnullerReservation.
     *
     * @param Activity $activity
     */
    public function __construct(Activity $activity)
    {
        $this->activity = $activity;
    }

    /**
     * Construire le message de l'email.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Notification de commande - anuller reservation')
                    ->view('mails.order_state_email_anuller_reservation');  // Vue spécifique pour anuller reservation
    }
}
