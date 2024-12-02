<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RolePermission extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'value',
        'user_role_id'
    ];

    public function role(): HasOne
    {
        return $this->hasOne(UserRole::class);
    }
}
