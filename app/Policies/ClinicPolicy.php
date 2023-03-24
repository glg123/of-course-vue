<?php

namespace App\Policies;

use App\Models\Clinic;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClinicPolicy
{
    use HandlesAuthorization;

   /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Clinic  $model
     * @return mixed
     */
    public function view(User $user, Clinic $model)
    {
        return $user->can('e-clinic-view');
    }

    /**
     * Determine whether the user can create the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Clinic  $model
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('e-clinic-add');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Clinic  $model
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->can('e-clinic-edit') ;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Clinic  $model
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->can('e-clinic-delete');
    }
}
