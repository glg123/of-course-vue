<?php

namespace App\Transformers;

use App\Models\User;
use App\Models\UserSubscription;
use League\Fractal\TransformerAbstract;

class UserTransform extends TransformerAbstract
{
    protected  array $availableIncludes = ['api_token','celebrity_packages','subscription','addresses'];

    protected  array $defaultIncludes = [
        'main_address'
    ];

    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'address' => $user->address,
            'image' => $user->image_path,
            'roles' => $user->roles ? $user->roles->pluck('name') : null,
            'is_verified' => $user->verified_at != null,
        ];
    }

    public function includeApiToken(User $user)
    {
        return $this->primitive($user, function ($user) {
            return $user->createToken('api')->accessToken;
        });
    }

    public function includeCelebrityPackages(User $user)
    {
        return $this->collection($user->celebrity_packages, new PackageTransform());
    }

    public function includeAddresses(User $user)
    {
        return $this->collection($user->addresses, new UserAddressTransform());
    }

    public function includeMainAddress(User $user)
    {
        return $user->main_address() ?  $this->item($user->main_address(), new UserAddressTransform()) : null;
      
    }

    public function includeSubscription(User $user)
    {
        // return $this->primitive($user, function ($user) {
        return $user->user_subscription ? $this->item($user->user_subscription, new UserSubscriptionsTransform()) : null;
        // });
        // return $this->item($user->user_subscription, new UserSubscriptionsTransform());
    }


}