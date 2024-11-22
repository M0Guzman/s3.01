<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TravelStep extends Model
{
    public function activities(): HasMany
    {
        return $this->hasMany(TravelActivity::class);
    }
}
