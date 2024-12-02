<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'travel_id',
        'user_id',
        'rating',
        'title',
        'descripting'
    ];

    public function travel(): HasOne
    {
        return $this->hasOne(Travel::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
