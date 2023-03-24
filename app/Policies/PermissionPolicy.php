<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Spatie\Permission\Models\Permission;

class PermissionPolicy
{
    use HandlesAuthorization;

   /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  Spatie\Permission\Models\Permission  $model
     * @return mixed
     */
    public function view(User $user, Permission $model)
    {
        return $user->can('view permissions');
    }

    /**
     * Determine whether the user can create the model.
     *
     * @param  \App\User  $user
     * @param  Spatie\Permission\Models\Permission  $model
     * @return mixed
     */
    public function create(User $user, Permission $model)
    {
        return $user->can('create permissions');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  Spatie\Permission\Models\Permission  $model
     * @return mixed
     */
    public function update(User $user, Permission $model)
    {
        return $user->can('update permissions');
    }

    /**
     * Determine whether the user can Permission the model.
     *
     * @param  \App\User  $user
     * @param  Spatie\Permission\Models\Permission  $model
     * @return mixed
     */
    public function delete(User $user, Permission $model)
    {
        return $user->can('delete permissions');
    }
}
