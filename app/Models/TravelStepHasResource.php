<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TravelStepHasResource extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $primaryKey = ['travel_step_id', 'resource_id'];
    public $incrementing = false;

    protected $fillable = [
        'travel_step_id',
        'resource_id'
    ];

    public function travel_step(): BelongsTo
    {
        return $this->belongsTo(TravelStep::class);
    }

    public function resource(): BelongsTo
    {
        return $this->belongsTo(Resource::class);
    }
}
