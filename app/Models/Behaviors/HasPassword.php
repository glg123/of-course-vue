<?php

namespace App\Models\Behaviors;

Trait HasPassword
{
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}