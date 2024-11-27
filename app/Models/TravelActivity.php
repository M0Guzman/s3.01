<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TravelActivity extends Model
{
    public function travel_step(): HasOne
    {
        return $this->hasOne(TravelStep::class);
    }

    public function activity(): HasOne
    {
        return $this->hasOne(Activity::class);
    }
}
