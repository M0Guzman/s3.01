<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    
    public function travel(): BelongsTo
    {
        return $this->belongsTo(Travel::class);
    }

    public function order(): HasOne
    {
        return $this->hasOne(Order::class);
    }

    /*protected static function boot()
    {
        static::deleting(function(User $user) { // before delete() method call this
            BookingOrder::where('order_id',  '=', $this->order_id)->where('booking_id', '=', $this->id)->delete();
            // do the rest of the cleanup...
       });
    }*/
}
