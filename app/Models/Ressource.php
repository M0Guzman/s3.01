<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ressource extends Model
{
    public function get_url(): string
    {
        return route('file', $this->id);
    }
}
