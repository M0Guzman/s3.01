<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class WineRoadStep extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'g_p_s_coordinate_id',
        'address_id',
        'wine_road_id',
        'name'
    ];

    public function g_p_s_coordinate() : BelongsTo
    {
        return $this->belongsTo(GPSCoordinate::class);
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function wine_road(): BelongsTo
    {
        return $this->belongsTo(WineRoad::class);
    }
}
