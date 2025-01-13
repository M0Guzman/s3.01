<?php
namespace App\Mail;

use App\Models\Activity;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderStateEmailInformeReservation extends Mailable
{
    use Queueable, SerializesModels;

    public $activity;

    /**
     * Créer une nouvelle instance de la classe OrderStateEmailInformeReservation.
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
        return $this->subject('Notification de commande - informe reservation')
                    ->view('mails.order_state_email_informe_reservation');  // Vue spécifique pour informe reservation
    }
}
