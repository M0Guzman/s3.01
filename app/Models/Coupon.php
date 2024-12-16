<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Coupon extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'code',
        'value',
        'expiration_date'
    ];

    public function order(): HasOne
    {
        return $this->hasOne(Order::class);
    }

    
}
