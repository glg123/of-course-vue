<?php

namespace App\Policies;

use App\Models\Offer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OfferPolicy
{
    use HandlesAuthorization;

   /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Offer  $model
     * @return mixed
     */
    public function view(User $user, Offer $model)
    {
        return $user->can('offer-view');
    }

    /**
     * Determine whether the user can create the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Offer  $model
     * @return mixed
     */
    public function create(User $user, Offer $model)
    {
        return $user->can('offer-add');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Offer  $model
     * @return mixed
     */
    public function update(User $user, Offer $model)
    {
        return $user->can('offer-edit') ;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Offer  $model
     * @return mixed
     */
    public function delete(User $user, Offer $model)
    {
        return $user->can('offer-delete');
    }
}
