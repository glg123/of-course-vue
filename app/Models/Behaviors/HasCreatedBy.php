<?php

namespace App\Models\Behaviors;

use App\Models\User;

Trait HasCreatedBy
{

    public function created_by(){
        return $this->belongsTo(User::class,'created_by');
    }

}