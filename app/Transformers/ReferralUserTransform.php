<?php

namespace App\Transformers;

use App\Models\Meal;
use App\Models\Package;
use App\Models\Referral;
use App\Models\ReferralUser;
use League\Fractal\TransformerAbstract;

class ReferralUserTransform extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected  array $defaultIncludes = [
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected  array $availableIncludes = [
        'user'
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(ReferralUser $referralUser)
    {
        return [
            "id"=>$referralUser->id,
            "reference_id"=>(string)$referralUser->reference_id,
            "code"=>(string)$referralUser->code,
            "active"=>$referralUser->active,
            "image"=>$referralUser->image_path,
            "created_at"=>$referralUser->created_at->format('Y-m-d'),
        ];
    }

    public function includeUser(ReferralUser $referralUser)
    {
        return $this->item($referralUser->user, new UserTransform());
    }

    // public function includeTransactions(ReferralUser $referralUser)
    // {
    //     return $this->collection($package->varients, new PackageVarientTransform());
    // }

}
