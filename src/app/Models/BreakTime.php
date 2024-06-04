<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BreakTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'time_id',
        'break_start',
        'break_end',
    ];

    public function time()
    {
        return $this->belongsTo(Time::class);
    }
}
