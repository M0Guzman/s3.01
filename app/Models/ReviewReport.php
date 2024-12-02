<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ReviewReport extends Model
{
    use HasFactory;

    public function review(): HasOne
    {
        return $this->hasOne(Review::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
