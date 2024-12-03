<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class WineCellar extends Model
{
    use HasFactory;

    public function partner(): HasOne
    {
        return $this->hasOne(Partner::class);
    }
}
