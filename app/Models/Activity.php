<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Activity extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'timeslot',
        'adult_price',
        'children_price'
    ];

    public function partner(): HasOne
    {
        return $this->hasOne(Partner::class);
    }

    public function activity_type(): HasOne
    {
        return $this->hasOne(ActivityType::class);
    }

    public function activity_category(): HasOne
    {
        return $this->hasOne(ActivityCategory::class);
    }
}
