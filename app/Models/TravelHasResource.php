<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TravelHasResource extends Model
{
    use HasFactory;

    public function travel(): BelongsTo
    {
        return $this->belongsTo(Travel::class);
    }

    public function ressource(): BelongsTo
    {
        return $this->belongsTo(Ressource::class);
    }
}
