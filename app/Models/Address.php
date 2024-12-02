<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class Address extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'street',
        'phone',
        'city_id'
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
