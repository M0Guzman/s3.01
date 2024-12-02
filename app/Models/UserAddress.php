<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAddress extends Model
{
    public $timestamps = false;
    public $primaryKey = ['user_id', 'address_id'];

    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'address_id'
    ];

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }
}
