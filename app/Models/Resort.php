<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resort extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    // public function path()
    // {
    //     return route('resorts.index', $this);
    // }

    public function getImageAttribute($value): ?string
    {
        if($value)
            return asset('storage/'. $value);

        return null;
    }

    public function bookings():HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
