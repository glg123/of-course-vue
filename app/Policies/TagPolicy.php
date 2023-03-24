<?php

namespace App\Policies;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TagPolicy
{
    use HandlesAuthorization;

   /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Tag  $model
     * @return mixed
     */
    public function view(User $user, Tag $model)
    {
        return $user->can('view tags');
    }

    /**
     * Determine whether the user can create the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Tag  $model
     * @return mixed
     */
    public function create(User $user, Tag $model)
    {
        return $user->can('create tags');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Tag  $model
     * @return mixed
     */
    public function update(User $user, Tag $model)
    {
        return $user->can('update tags') ;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Tag  $model
     * @return mixed
     */
    public function delete(User $user, Tag $model)
    {
        return $user->can('delete tags');
    }
}
