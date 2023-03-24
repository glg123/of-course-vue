<?php

namespace App\Policies;

use App\Models\ReferralUser;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReferralUserPolicy
{
    use HandlesAuthorization;

   /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ReferralUser  $model
     * @return mixed
     */
    public function view(User $user, ReferralUser $model)
    {
        return $user->can('view referral_users');
    }

    /**
     * Determine whether the user can create the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ReferralUser  $model
     * @return mixed
     */
    public function create(User $user, ReferralUser $model)
    {
        return $user->can('create referral_users');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ReferralUser  $model
     * @return mixed
     */
    public function update(User $user, ReferralUser $model)
    {
        return $user->can('update referral_users') ;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ReferralUser  $model
     * @return mixed
     */
    public function delete(User $user, ReferralUser $model)
    {
        return $user->can('delete referral_users');
    }
}
