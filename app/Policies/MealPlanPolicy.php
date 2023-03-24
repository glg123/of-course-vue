<?php

namespace App\Policies;

use App\Models\User;
use App\Models\MealPlan;
use Illuminate\Auth\Access\HandlesAuthorization;

class MealPlanPolicy
{
    use HandlesAuthorization;

   /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MealPlan  $model
     * @return mixed
     */
    public function view(User $user, MealPlan $model)
    {
        return $user->can('diet-plan-view');
    }

    /**
     * Determine whether the user can create the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\MealPlan  $model
     * @return mixed
     */
    public function create(User $user, MealPlan $model)
    {
        return $user->can('diet-plan-add');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\MealPlan  $model
     * @return mixed
     */
    public function update(User $user, MealPlan $model)
    {
        return $user->can('diet-plan-edit') ;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\MealPlan  $model
     * @return mixed
     */
    public function delete(User $user, MealPlan $model)
    {
        return $user->can('diet-plan-delete');
    }
}
