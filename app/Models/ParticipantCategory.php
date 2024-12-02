<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParticipantCategory extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}
