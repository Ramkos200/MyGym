<?php

namespace App\Policies;

use App\Models\SchedualedClass;
use App\Models\User;

class SchedualedClassPolicy
{
    /**
     * Create a new policy instance.
     */
    public function delete(User $user, SchedualedClass $schedualedClass)
    {
        //
        return $user->id === $schedualedClass->instructor_id;
    }
}