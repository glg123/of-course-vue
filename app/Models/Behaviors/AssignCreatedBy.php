<?php


namespace App\Models\Behaviors;


use App\Models\User;

trait AssignCreatedBy
{

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            $item->created_by = auth()->id() ?: User::whereRelation('roles', 'name', 'admin')->first()->id;
        });
    }

}
