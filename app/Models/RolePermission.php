<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RolePermission extends Model
{
    public function role(): HasOne
    {
        return $this->hasOne(UserRole::class);
    }
}
