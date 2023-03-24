<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Notification;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotificationPolicy
{
    use HandlesAuthorization;

   /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Notification  $model
     * @return mixed
     */
    public function view(User $user, Notification $model)
    {
        return $user->can('view notifications');
    }

    /**
     * Determine whether the user can create the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Notification  $model
     * @return mixed
     */
    public function create(User $user, Notification $model)
    {
        return $user->can('create notifications');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Notification  $model
     * @return mixed
     */
    public function update(User $user, Notification $model)
    {
        return $user->can('update notifications') ;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Notification  $model
     * @return mixed
     */
    public function delete(User $user, Notification $model)
    {
        return $user->can('delete notifications');
    }
}
