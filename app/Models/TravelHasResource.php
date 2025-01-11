<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TravelHasResource extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $primaryKey = ['travel_id', 'resource_id'];

    public $incrementing = false;

    protected $fillable = [
        'travel_id',
        'resource_id'
    ];



    public function travel(): BelongsTo
    {
        return $this->belongsTo(Travel::class);
    }

    public function resource(): BelongsTo
    {
        return $this->belongsTo(Resource::class);
    }
}
