<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Travel extends Model
{
    public function wine_road(): HasOne
    {
        return $this->hasOne(WineRoad::class);
    }

    public function department(): HasOne
    {
        return $this->hasOne(Department::class);
    }

    public function travel_category(): HasOne
    {
        return $this->hasOne(TravelCategory::class);
    }

    public function vineyard_category(): HasOne
    {
        return $this->hasOne(VineyardCategory::class);
    }

    public function participant_category(): HasOne
    {
        return $this->hasOne(ParticipantCategory::class);
    }
}
