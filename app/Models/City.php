<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'zip',
        'department_id'
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function casts(): array
    {
        return [
            'zip' => 'string'
        ];
    }
}
