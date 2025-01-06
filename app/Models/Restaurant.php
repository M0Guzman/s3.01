<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Restaurant extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'partner_id';

    protected $fillable = [
        'partner_id',
        'cooking_type_id',
        'ranking',
        'speciality'
    ];


    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }

    public function cooking_type(): HasOne
    {
        return $this->hasOne(CookingType::class);
    }
}
