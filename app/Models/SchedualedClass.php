<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class SchedualedClass extends Model
{
    protected $guarded = [];
    protected $casts = [
        'date_time' => 'datetime',
    ];
    function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }
    function ClassType()
    {
        return $this->belongsTo(ClassType::class);
    }
}