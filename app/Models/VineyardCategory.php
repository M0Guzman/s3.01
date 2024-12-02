<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VineyardCategory extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}
