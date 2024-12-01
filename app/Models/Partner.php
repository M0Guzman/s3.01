<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Partner extends Model
{
    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }
}
