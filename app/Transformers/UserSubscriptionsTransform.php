<?php

namespace App\Transformers;

use App\Models\UserSubscription;
use League\Fractal\TransformerAbstract;

class UserSubscriptionsTransform extends TransformerAbstract
{
    protected  array $availableIncludes = [
        'user', 'trainer', 'package', 'package_varient', 'copoun', 'offer'

    ];

    protected  array $defaultIncludes = [];

    public function transform(UserSubscription $userSubscription)
    {
        return [
            'id' => $userSubscription->id,
            'referral_code' => $userSubscription->referral_code,
            'status' => $userSubscription->status,
            'price' => $userSubscription->price,
            'discount' => $userSubscription->discount,
            'qty' => $userSubscription->qty,
            'total' => $userSubscription->total,
            'active' => $userSubscription->active,
            'start_at' => $userSubscription->start_at,
            'end_at' => $userSubscription->end_at,
            'type' => $userSubscription->type,
            'payments' => $userSubscription->payments,
            'created_at' => $userSubscription->created_at->format('Y-m-d H:i')
        ];
    }

    public function includeUser(UserSubscription $userSubscription)
    {
        if (!$userSubscription->user)
            return null;

        return $this->item($userSubscription->user, new UserTransform());
    }

    public function includeTrainer(UserSubscription $userSubscription)
    {
        if (!$userSubscription->trainer)
            return null;

        return $this->item($userSubscription->trainer, new UserTransform());
    }

    public function includePackage(UserSubscription $userSubscription)
    {
        if (!$userSubscription->package)
            return null;

        return $this->item($userSubscription->package, new PackageTransform());
    }

    public function includePackageVarient(UserSubscription $userSubscription)
    {
        if (!$userSubscription->varient)
            return null;

        return $this->item($userSubscription->varient, new PackageVarientTransform());
    }

    public function includeOffer(UserSubscription $userSubscription)
    {
        if (!$userSubscription->offer)
            return null;

        return $this->item($userSubscription->offer, new OfferTransform());
    }

    public function includeCopoun(UserSubscription $userSubscription)
    {
        if (!$userSubscription->copoun)
            return null;

        return $this->item($userSubscription->copoun, new CopounTransform());
    }
}
