<?php

namespace App\Policies;

use App\Models\Referral;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReferralPolicy
{
    use HandlesAuthorization;

   /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Referral  $model
     * @return mixed
     */
    public function view(User $user, Referral $model)
    {
        return $user->can('referral-view');
    }

    /**
     * Determine whether the user can create the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Referral  $model
     * @return mixed
     */
    public function create(User $user, Referral $model)
    {
        return $user->can('referral-view');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Referral  $model
     * @return mixed
     */
    public function update(User $user, Referral $model)
    {
        return $user->can('referral-setting') ;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Referral  $model
     * @return mixed
     */
    public function delete(User $user, Referral $model)
    {
        return $user->can('referral-setting');
    }
}
