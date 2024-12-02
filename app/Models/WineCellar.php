<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class WineCellar extends Model
{
    public function partner(): HasOne
    {
        return $this->hasOne(Partner::class);
    }
}
