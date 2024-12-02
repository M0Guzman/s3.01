<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{

    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'filename',
        'mimetype',
        'permission'
    ];

    public function get_url(): string
    {
        return route('file', $this->id);
    }
}
