<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GPSCoordinate extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillables = [
        'longitude',
        'latitude'
    ];
}
