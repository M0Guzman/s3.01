<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Review extends Model
{
    public function travel(): HasOne
    {
        return $this->hasOne(Travel::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
