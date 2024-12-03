<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Partner extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillables = [
        'activity_type_id',
        'address_id',
        'name',
        'email',
        'phone'
    ];

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function activity_type(): BelongsTo
    {
        return $this->belongsTo(ActivityType::class);
    }
}
