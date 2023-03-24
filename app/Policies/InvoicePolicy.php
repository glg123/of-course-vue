<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Invoice;
use Illuminate\Auth\Access\HandlesAuthorization;

class InvoicePolicy
{
    use HandlesAuthorization;

   /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Invoice  $model
     * @return mixed
     */
    public function view(User $user, Invoice $model)
    {
        return $user->can('view invoices');
    }

    /**
     * Determine whether the user can create the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Invoice  $model
     * @return mixed
     */
    public function create(User $user, Invoice $model)
    {
        return $user->can('create invoices');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Invoice  $model
     * @return mixed
     */
    public function update(User $user, Invoice $model)
    {
        return $user->can('update invoices') ;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Invoice  $model
     * @return mixed
     */
    public function delete(User $user, Invoice $model)
    {
        return $user->can('delete invoices');
    }
}
