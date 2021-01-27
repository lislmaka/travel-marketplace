<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->hasMany(PivotEventCategory::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function country()
    {
        return $this->belongsTo(EventCountry::class);
    }

    public function city()
    {
        return $this->belongsTo(EventCity::class);
    }
}
