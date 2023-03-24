<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;


    public function viewManger(User $user)
    {
        return $user->can('manager-view');
    }


    public function createManager(User $user, User $model)
    {
        return $user->can('manager-add');
    }


    public function updateManager(User $user, User $model)
    {
        return $user->can('manager-edit') || $user->id === $model->id;
    }


    public function deleteManager(User $user, User $model)
    {
        return $user->can('manager-delete') && $user->id != $model->id;
    }

    // driver
    public function viewDriver(User $user)
    {
        return $user->can('manager-driver-view');
    }


    public function createDriver(User $user, User $model)
    {
        return $user->can('manager-driver-add');
    }


    public function updateDriver(User $user, User $model)
    {
        return $user->can('manager-driver-edit') || $user->id === $model->id;
    }


    public function deleteDriver(User $user, User $model)
    {
        return $user->can('manager-delete') && $user->id != $model->id;
    }

    // dietitian
    public function viewDietitian(User $user)
    {
        return $user->can('manager-dietitian-view');
    }


    public function createDietitian(User $user, User $model)
    {
        return $user->can('manager-dietitian-add');
    }


    public function updateDietitian(User $user, User $model)
    {
        return $user->can('manager-dietitian-edit') || $user->id === $model->id;
    }


    public function deleteDietitian(User $user, User $model)
    {
        return $user->can('manager-dietitian-delete') && $user->id != $model->id;
    }

      // celebrity
      public function viewCelebrity(User $user)
      {
          return $user->can('manager-celebrity-view');
      }
  
  
      public function createCelebrity(User $user, User $model)
      {
          return $user->can('manager-celebrity-add');
      }
  
  
      public function updateCelebrity(User $user, User $model)
      {
          return $user->can('manager-celebrity-edit') || $user->id === $model->id;
      }
  
  
      public function deleteCelebrity(User $user, User $model)
      {
          return $user->can('manager-celebrity-delete') && $user->id != $model->id;
      }
}
