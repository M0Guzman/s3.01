<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Activity extends Model
{
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
