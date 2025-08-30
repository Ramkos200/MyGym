<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchedualedClass extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'date_time' => 'datetime',
    ];
    function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }
    function classType()
    {
        return $this->belongsTo(ClassType::class);
    }
    function members()
    {
        return $this->belongsToMany(User::class, 'bookings');
    }
    function scopeUpcoming(Builder $query)
    {
        return $query->where('date_time', '>', now());
    }
}