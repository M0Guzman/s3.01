<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillables = [
        'payment_type_id',
        'resource',
        'user_id',
        'address_id',
        'order_state_id'
    ];

    public function payment_type(): BelongsTo
    {
        return $this->belongsTo(PaymentType::class);
    }

    public function resource(): BelongsTo
    {
        return $this->belongsTo(Resource::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function coupon(): BelongsTo
    {
        return $this->belongsTo(Coupon::class);
    }

    public function bookings(): BelongsToMany
    {
        return $this->belongsToMany(Booking::class, 'booking_orders');
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }
}
