<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class City extends Model
{
    public function department(): HasOne
    {
        return $this->hasOne(Department::class);
    }
}
