<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Address extends Model
{
    public function city(): HasOne
    {
        return this->hasOne(City::class);
    }
}
