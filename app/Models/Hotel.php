<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Hotel extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'partner_id';

    protected $fillables = [
        'partner_id',
        'description',
        'room_count'
    ];


    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }
}
