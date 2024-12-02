<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TravelCategory extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

}
