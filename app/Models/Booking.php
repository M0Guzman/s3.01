<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'travel_id',
        'adult_count',
        'children_count',
        'room_count',
        'start_date'
    ];

    public function get_price() : float
    {
        return $this->travel->price_per_person * ($this->adult_count + $this->children_count);
    }

    public function travel(): BelongsTo
    {
        return $this->belongsTo(Travel::class);
    }

    public function offered_travel(): HasOne
    {
        return $this->hasOne(OfferedTravel::class);
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'booking_orders');
    }
}
