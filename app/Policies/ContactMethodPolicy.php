<?php

namespace App\Policies;

use App\Models\ContactMethod;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContactMethodPolicy
{
    use HandlesAuthorization;

   /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ContactMethod  $model
     * @return mixed
     */
    public function view(User $user, ContactMethod $model)
    {
        return $user->can('contact-view');
    }

    /**
     * Determine whether the user can create the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ContactMethod  $model
     * @return mixed
     */
    public function create(User $user, ContactMethod $model)
    {
        return $user->can('contact-add');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ContactMethod  $model
     * @return mixed
     */
    public function update(User $user, ContactMethod $model)
    {
        return $user->can('contact-edit') ;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ContactMethod  $model
     * @return mixed
     */
    public function delete(User $user, ContactMethod $model)
    {
        return $user->can('contact-delete');
    }
}
