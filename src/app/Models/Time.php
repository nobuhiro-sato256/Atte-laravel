<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Time extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'date',
        'start_time',
        'end_time',
        'break_time',
        'work_time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function breaktime()
    {
        return $this->hasMany(BreakTime::class);
    }
}
