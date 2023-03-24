<?php

namespace App\Policies;

use App\Models\Meal;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MealPolicy
{
    use HandlesAuthorization;

   /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Meal  $model
     * @return mixed
     */
    public function view(User $user, Meal $model)
    {
        return $user->can('meal-view');
    }

    /**
     * Determine whether the user can create the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Meal  $model
     * @return mixed
     */
    public function create(User $user, Meal $model)
    {
        return $user->can('meal-add');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Meal  $model
     * @return mixed
     */
    public function update(User $user, Meal $model)
    {
        return $user->can('meal-edit') ;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Meal  $model
     * @return mixed
     */
    public function delete(User $user, Meal $model)
    {
        return $user->can('meal-delete');
    }
}
