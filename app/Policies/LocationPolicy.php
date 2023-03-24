<?php

namespace App\Policies;

use App\Models\Location;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LocationPolicy
{
    use HandlesAuthorization;

   /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Location  $model
     * @return mixed
     */
    public function view(User $user, Location $model)
    {
        return $user->can('location-view');
    }

    /**
     * Determine whether the user can create the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Tag  $model
     * @return mixed
     */
    public function create(User $user, Location $model)
    {
        return $user->can('location-add');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Location  $model
     * @return mixed
     */
    public function update(User $user, Location $model)
    {
        return $user->can('location-edit');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Location  $model
     * @return mixed
     */
    public function delete(User $user, Location $model)
    {
        return $user->can('location-delete');
    }
}
