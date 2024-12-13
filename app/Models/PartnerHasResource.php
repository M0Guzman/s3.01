<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerHasResource extends Model
{
    use HasFactory;

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }

    public function resource(): BelongsTo
    {
        return $this->belongsTo(Resource::class);
    }
}
