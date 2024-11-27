<?php

namespace App;

use App\Mail\OTPCode;
use Fouladgar\MobileVerification\Contracts\SMSClient;
use Fouladgar\MobileVerification\Notifications\Messages\Payload;
use Illuminate\Support\Facades\Mail;

class MySMSClient implements SMSClient
{
    /**
     * @param Payload $payload
     *
     * @return mixed
     */
    public function sendMessage(Payload $payload):mixed
    {
        return Mail::to($payload->getTo())->send(new OTPCode($payload->getToken()));
    }
}
