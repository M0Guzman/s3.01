<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Partner extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'activity_type_id',
        'address_id',
        'name',
        'email',
        'description',
        'phone'
    ];

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function activity_type(): BelongsTo
    {
        return $this->belongsTo(ActivityType::class);
    }

    public function restaurant(): HasOne
    {
        return $this->hasOne(Restaurant::class);
    }

    public function hotel(): HasOne
    {
        return $this->hasOne(Hotel::class);
    }

    public function wine_cellar(): HasOne
    {
        return $this->hasOne(WineCellar::class);
    }

    public function other_partner(): HasOne
    {
        return $this->hasOne(OtherPartner::class);
    }

    public function resources(): BelongsToMany
    {
        return $this->belongsToMany(Resource::class, 'partner_has_resources');
    }
}
