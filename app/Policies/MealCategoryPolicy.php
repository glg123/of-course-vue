<?php

namespace App\Policies;

use App\Models\User;
use App\Models\MealCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class MealCategoryPolicy
{
    use HandlesAuthorization;

   /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MealCategory  $model
     * @return mixed
     */
    public function view(User $user, MealCategory $model)
    {
        return $user->can('meals-category-view');
    }

    /**
     * Determine whether the user can create the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\MealCategory  $model
     * @return mixed
     */
    public function create(User $user, MealCategory $model)
    {
        return $user->can('meals-category-add');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\MealCategory  $model
     * @return mixed
     */
    public function update(User $user, MealCategory $model)
    {
        return $user->can('meals-category-edit') ;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\MealCategory  $model
     * @return mixed
     */
    public function delete(User $user, MealCategory $model)
    {
        return $user->can('meals-category-delete');
    }
}
