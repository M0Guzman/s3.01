<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OtherPartner extends Model
{
    public function partner(): HasOne
    {
        return $this->hasOne(Partner::class);
    }

    public function other_partner_activity_type(): HasOne
    {
        return $this->hasOne(OtherPartnerActivityType::class);
    }
}
