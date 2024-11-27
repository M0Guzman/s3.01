<?php

namespace App;

use Fouladgar\MobileVerification\Contracts\SMSClient;
use Fouladgar\MobileVerification\Notifications\Messages\Payload;
use Illuminate\Support\Facades\Http;

class MySMSClient implements SMSClient
{
    protected $SMSService;


    /**
     * @param Payload $payload
     *
     * @return mixed
     */
    public function sendMessage(Payload $payload):mixed
    {
        // preparing SMSService

        if(!isset($this->SMSService)) {
        }

        $res = Http::post("https://textbelt.com/text", [
            'phone' => $payload->getTo(),
            'message' =>  "You verification code for Vino: " . $payload->getToken(),
            'key' => '85d3a9f6e45beaeff0e86583c357b37f34e29e4aU78PdzOIB6ohLqrE0nmDInDD8'
        ]);

        info($res);
        return $res;
    }

    // ...
}
