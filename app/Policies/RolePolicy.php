<?php

namespace App\Policies;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Spatie\Permission\Models\Role;

class RolePolicy
{
    use HandlesAuthorization;

   /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  Spatie\Permission\Models\Role  $model
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->can('manager-view-permission');
    }

    /**
     * Determine whether the user can create the model.
     *
     * @param  \App\User  $user
     * @param  Spatie\Permission\Models\Role  $model
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('manager-add-permission');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  Spatie\Permission\Models\Role  $model
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->can('manager-edit-permission');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  Spatie\Permission\Models\Role  $model
     * @return mixed
     */
    public function delete(User $user, Role $model)
    {
        return $user->can('manager-delete-permission') && !in_array($model->id,RoleEnum::getValues());
    }
}
