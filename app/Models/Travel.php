<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Travel extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'wine_road_id',
        'department_id',
        'travel_category_id',
        'vineyard_category_id',
        'ParticipantCategory_id',
        'title',
        'description',
        'price_per_person',
        'days'
    ];

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

    public function travel_steps(): HasMany
    {
        return $this->hasMany(TravelStep::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function resources(): BelongsToMany
    {
        return $this->belongsToMany(Resource::class, 'travel_has_resources');
    }
}
