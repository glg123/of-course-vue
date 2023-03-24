<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Review;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReviewPolicy
{
    use HandlesAuthorization;

   /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Review  $model
     * @return mixed
     */
    public function view(User $user, Review $model)
    {
        return $user->can('view reviews');
    }

    /**
     * Determine whether the user can create the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Review  $model
     * @return mixed
     */
    public function create(User $user, Review $model)
    {
        return $user->can('create reviews');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Review  $model
     * @return mixed
     */
    public function update(User $user, Review $model)
    {
        return $user->can('update reviews') ;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Review  $model
     * @return mixed
     */
    public function delete(User $user, Review $model)
    {
        return $user->can('delete reviews');
    }
}
