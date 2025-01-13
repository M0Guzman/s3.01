<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WineRoadHasResource extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $primaryKey = ['wine_road_id', 'resource_id'];
    public $incrementing = false;

    protected $fillable = [
        'wine_road_id',
        'resource_id'
    ];

    public function wine_road(): BelongsTo
    {
        return $this->belongsTo(WineRoad::class);
    }

    public function resource(): BelongsTo
    {
        return $this->belongsTo(Resource::class);
    }
}
