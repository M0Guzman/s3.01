<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class WineRoadStep extends Model
{
    public function g_p_s_coordinate() : HasOne
    {
        return $this->hasOne(GPSCoordinate::class);
    }

    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }

    public function wine_road(): HasOne
    {
        return $this->hasOne(WineRoad::class);
    }
}
