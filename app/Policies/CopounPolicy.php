<?php

namespace App\Policies;

use App\Models\Copoun;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CopounPolicy
{
    use HandlesAuthorization;

   /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Copoun  $model
     * @return mixed
     */
    public function view(User $user, Copoun $model)
    {
        return $user->can('promo-code-view');
    }

    /**
     * Determine whether the user can create the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Copoun  $model
     * @return mixed
     */
    public function create(User $user, Copoun $model)
    {
        return $user->can('promo-code-add');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Copoun  $model
     * @return mixed
     */
    public function update(User $user, Copoun $model)
    {
        return $user->can('promo-code-edit') ;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Copoun  $model
     * @return mixed
     */
    public function delete(User $user, Copoun $model)
    {
        return $user->can('promo-code-delete');
    }
}
