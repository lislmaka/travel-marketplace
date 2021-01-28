<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PivotEventOption extends Model
{
    use HasFactory;

    public function option()
    {
        return $this->belongsTo(EventOption::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
