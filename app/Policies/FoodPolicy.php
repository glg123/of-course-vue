<?php

namespace App\Policies;

use App\Models\Food;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FoodPolicy
{
    use HandlesAuthorization;

    //foods
    public function view(User $user, Food $model)
    {
        return $user->can('master-data-view');
    }

 
    public function create(User $user, Food $model)
    {
        return $user->can('master-data-add');
    }


    public function update(User $user, Food $model)
    {
        return $user->can('master-data-edit');
    }

    public function delete(User $user, Food $model)
    {
        return $user->can('master-data-delete');
    }

    // Stock
    public function viewStock(User $user)
    {
        return $user->can('stocks-view');
    }

    // purchase
    public function viewPurchase(User $user)
    {
        return $user->can('purchase-view');
    }

    public function createPurchase(User $user)
    {
        return $user->can('purchase-add');
    }
    public function submitPurchase(User $user)
    {
        return $user->can('purchase-submit');
    }

    // Adjust
    public function viewAdjustStock(User $user)
    {
        return $user->can('adjust-stock-view');
    }

    public function adjustStock(User $user)
    {
        return $user->can('adjust-stock-adjust');
    }
}
