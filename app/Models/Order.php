<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_type_id',
        'resource_id',
        'user_id',
        'address_id',
        'order_state_id',
        'coupon_id',
        'created_at'
    ];

    public function get_price(bool $ignore_coupon = false): float
    {
        $price = $this->bookings->sum(function($booking) {
            return $booking->get_price();
        });

        if($this->coupon_id != null && !$ignore_coupon) {
            $price = max(0, $price - $this->coupon->value);
        }

        return $price;
    }

    public function coupons(): BelongsTo
    {
        return $this->belongsTo(Coupon::class);
    }
    public function payment_type(): BelongsTo
    {
        return $this->belongsTo(PaymentType::class);
    }
    public function order_state(): BelongsTo
    {
        return $this->belongsTo(OrderState::class);
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
