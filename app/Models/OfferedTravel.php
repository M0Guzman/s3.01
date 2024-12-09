<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OfferedTravel extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'booking_id';

    protected $fillable = [
        'booking_id',
        'code'
    ];


    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }
}
