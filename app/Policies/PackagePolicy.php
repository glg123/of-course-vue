<?php

namespace App\Policies;

use App\Models\Food;
use App\Models\User;
use App\Models\Package;
use Illuminate\Auth\Access\HandlesAuthorization;

class PackagePolicy
{
    use HandlesAuthorization;

   /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Package  $model
     * @return mixed
     */
    public function view(User $user, Package $model)
    {
        return $user->can('plan-view');
    }

    /**
     * Determine whether the user can create the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Package  $model
     * @return mixed
     */
    public function create(User $user, Package $model)
    {
        return $user->can('plan-add');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Package  $model
     * @return mixed
     */
    public function update(User $user, Package $model)
    {
        return $user->can('plan-edit') ;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Package  $model
     * @return mixed
     */
    public function delete(User $user, Package $model)
    {
        return $user->can('plan-delete');
    }
}
