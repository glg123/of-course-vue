<?php

namespace App\Policies;

use App\Models\DietitianAppointment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DAppointmentPolicy
{
    use HandlesAuthorization;

   /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DietitianAppointment  $model
     * @return mixed
     */
    public function view(User $user, DietitianAppointment $model)
    {
        return $user->can('view dietitian_appointments');
    }

    /**
     * Determine whether the user can create the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\DietitianAppointment  $model
     * @return mixed
     */
    public function create(User $user, DietitianAppointment $model)
    {
        return $user->can('create dietitian_appointments');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\DietitianAppointment  $model
     * @return mixed
     */
    public function update(User $user, DietitianAppointment $model)
    {
        return $user->can('update dietitian_appointments') ;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\DietitianAppointment  $model
     * @return mixed
     */
    public function delete(User $user, DietitianAppointment $model)
    {
        return $user->can('delete dietitian_appointments');
    }
}
