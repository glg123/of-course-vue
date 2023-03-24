<?php

namespace App\Policies;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SettingPolicy
{
    use HandlesAuthorization;

   /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Setting  $model
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->can('setting-view-and-modify');
    }


    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Setting  $model
     * @return mixed
     */
    public function update(User $user)
    {
    
        return $user->can('setting-view-and-modify') ;
    }

   
}
