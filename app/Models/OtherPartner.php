<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OtherPartner extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'partner_id';

    protected $fillables = [
        'partner_id',
        'other_partner_activity_type_id',
    ];

    public function partner(): HasOne
    {
        return $this->hasOne(Partner::class);
    }

    public function other_partner_activity_type(): HasOne
    {
        return $this->hasOne(OtherPartnerActivityType::class);
    }
}
