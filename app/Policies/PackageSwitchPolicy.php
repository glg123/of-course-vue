<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PackageSwitch;
use Illuminate\Auth\Access\HandlesAuthorization;

class PackageSwitchPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PackageSwitch  $model
     * @return mixed
     */
    public function view(User $user, PackageSwitch $model)
    {
        return $user->can('plan-switch-view');
    }

    /**
     * Determine whether the user can create the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\PackageSwitch  $model
     * @return mixed
     */
    public function create(User $user, PackageSwitch $model)
    {
        return $user->can('plan-switch-add');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\PackageSwitch  $model
     * @return mixed
     */
    public function update(User $user, PackageSwitch $model)
    {
        return $user->can('plan-switch-swap');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\PackageSwitch  $model
     * @return mixed
     */
    public function delete(User $user, PackageSwitch $model)
    {
        return $user->can('plan-switch-delete');
    }
}
