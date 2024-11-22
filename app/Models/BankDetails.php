<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankDetails extends Model
{
    protected $casts = [
        'last_name' => 'encrypted',
        'card_number' => 'encrypted',
        'expiration_date' => 'encrypted'
    ];
}
