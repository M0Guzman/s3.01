<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ressource extends Model
{
    public function get_url(): string 
    {
        return "http://51.83.36.122:8123/resources/" . $this->id;
    }
}
