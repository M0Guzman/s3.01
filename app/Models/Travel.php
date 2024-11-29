<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Travel extends Model
{
    public function wine_road(): BelongsTo
    {
        return $this->belongsTo(WineRoad::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function travel_category(): BelongsTo
    {
        return $this->belongsTo(TravelCategory::class);
    }

    public function vineyard_category(): BelongsTo
    {
        return $this->belongsTo(VineyardCategory::class);
    }

    public function participant_category(): BelongsTo
    {
        return $this->belongsTo(ParticipantCategory::class);
    }

    public function ressources(): BelongsToMany
    {
        return $this->belongsToMany(Ressource::class, 'travel_has_resources');
    }
}
