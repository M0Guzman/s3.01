<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Restaurant extends Model
{
    public function partner(): HasOne
    {
        return $this->hasOne(Partner::class);
    }

    public function cooking_type(): HasOne
    {
        return $this->hasOne(CookingType::class);
    }
}
