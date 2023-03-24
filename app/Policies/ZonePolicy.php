<?php

namespace App\Policies;

use App\Models\Location;
use App\Models\User;
use App\Models\Zone;
use Illuminate\Auth\Access\HandlesAuthorization;

class ZonePolicy
{
    use HandlesAuthorization;

   /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Zone  $model
     * @return mixed
     */
    public function view(User $user, Zone $model)
    {
        return $user->can('view zones');
    }

    /**
     * Determine whether the user can create the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Zone  $model
     * @return mixed
     */
    public function create(User $user, Zone $model)
    {
        return $user->can('create zones');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Zone  $model
     * @return mixed
     */
    public function update(User $user, Zone $model)
    {
        return $user->can('update zones') ;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Zone  $model
     * @return mixed
     */
    public function delete(User $user, Zone $model)
    {
        return $user->can('delete zones');
    }
}
