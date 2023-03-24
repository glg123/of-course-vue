<?php

namespace App\Policies;

use App\Models\Unit;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UnitPolicy
{
    use HandlesAuthorization;

   /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Unit  $model
     * @return mixed
     */
    public function view(User $user, Unit $model)
    {
        return $user->can('view units');
    }

    /**
     * Determine whether the user can create the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Unit  $model
     * @return mixed
     */
    public function create(User $user, Unit $model)
    {
        return $user->can('create units');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Unit  $model
     * @return mixed
     */
    public function update(User $user, Unit $model)
    {
        return $user->can('update units') ;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Unit  $model
     * @return mixed
     */
    public function delete(User $user, Unit $model)
    {
        return $user->can('delete units');
    }
}
