<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassType extends Model
{
    function schedualedClasses()
    {
        return $this->hasMany(SchedualedClass::class);
    }
}