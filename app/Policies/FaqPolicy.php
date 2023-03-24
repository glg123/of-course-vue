<?php

namespace App\Policies;

use App\Models\Faq;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FaqPolicy
{
    use HandlesAuthorization;

   /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Faq  $model
     * @return mixed
     */
    public function view(User $user, Faq $model)
    {
        return $user->can('faq-view');
    }

    /**
     * Determine whether the user can create the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Faq  $model
     * @return mixed
     */
    public function create(User $user, Faq $model)
    {
        return $user->can('faq-add');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Faq  $model
     * @return mixed
     */
    public function update(User $user, Faq $model)
    {
        return $user->can('faq-update') ;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Faq  $model
     * @return mixed
     */
    public function delete(User $user, Faq $model)
    {
        return $user->can('faq-delete');
    }
}
