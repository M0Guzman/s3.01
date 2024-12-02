<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityCategory extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}
