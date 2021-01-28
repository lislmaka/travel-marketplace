<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PivotEventCategory extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(EventCategory::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
