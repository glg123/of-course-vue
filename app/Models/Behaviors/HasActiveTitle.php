<?php

namespace App\Models\Behaviors;


Trait HasActiveTitle
{

    public function getActiveTitleAttribute()
    {
        return $this->active || $this->status ? __('views.active') : __('views.not_active') ;
    }

}
