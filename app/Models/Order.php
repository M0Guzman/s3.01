<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    public function payment_type(): HasOne
    {
        return $this->hasOne(PaymentType::class);
    }

    public function ressource(): HasOne
    {
        return $this->hasOne(Ressource::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function coupon(): HasOne
    {
        return $this->hasOne(Coupon::class);
    }

    public function booking_orders(): BelongsToMany
    {
        return $this->belongsToMany(BookingOrder::class);
    }
}
