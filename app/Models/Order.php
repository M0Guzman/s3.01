<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    public function payment_type(): BelongsTo
    {
        return $this->belongsTo(PaymentType::class);
    }

    public function ressource(): BelongsTo
    {
        return $this->belongsTo(Ressource::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function coupon(): BelongsTo
    {
        return $this->belongsTo(Coupon::class);
    }

    public function booking_orders(): HasMany
    {
        return $this->hasMany(BookingOrder::class);
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }
}
