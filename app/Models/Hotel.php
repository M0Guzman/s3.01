<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Hotel extends Model
{
    public function partner(): HasOne
    {
        return $this->hasOne(Partner::class);
    }
}
