<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TravelStep extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'travel_id',
        'title',
        'description'
    ];

    public function activities(): BelongsToMany
    {
        return $this->belongsToMany(Activity::class, 'travel_step_activities');
    }

    public function resources(): BelongsToMany
    {
        return $this->belongsToMany(Resource::class, 'travel_step_has_resources');
    }
}
