<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WineRoad extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description'
    ];

    public function wineRoadSteps(): HasMany
    {
        return $this->hasMany(WineRoadStep::class);
    }

    public function resources(): BelongsToMany
    {
        return $this->belongsToMany(Resource::class, 'wine_road_has_resources');
    }
}
