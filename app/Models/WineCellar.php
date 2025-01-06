<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WineCellar extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $primaryKey = 'partner_id';

    protected $fillable = [
        'partner_id',
        'sampling_type_id'
    ];


    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }
}
