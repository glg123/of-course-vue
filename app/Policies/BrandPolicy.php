<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Brand;
use Illuminate\Auth\Access\HandlesAuthorization;

class BrandPolicy
{
    use HandlesAuthorization;

   /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Brand  $model
     * @return mixed
     */
    public function view(User $user, Brand $model)
    {
        return $user->can('view brands');
    }

    /**
     * Determine whether the user can create the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Brand  $model
     * @return mixed
     */
    public function create(User $user, Brand $model)
    {
        return $user->can('create brands');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Brand  $model
     * @return mixed
     */
    public function update(User $user, Brand $model)
    {
        return $user->can('update brands') ;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Brand  $model
     * @return mixed
     */
    public function delete(User $user, Brand $model)
    {
        return $user->can('delete brands');
    }
}
