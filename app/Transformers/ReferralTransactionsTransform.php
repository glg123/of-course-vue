<?php

namespace App\Transformers;

use App\Models\Meal;
use App\Models\Package;
use App\Models\Referral;
use App\Models\ReferralTransaction;
use League\Fractal\TransformerAbstract;

class ReferralTransactionsTransform extends TransformerAbstract
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
        'user','referral','referral_user'
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(ReferralTransaction $trans)
    {
        return [
            "id"=>$trans->id,
            "reference_id"=>$trans->reference_id,
            "code"=>$trans->code,
            "price"=>$trans->price,
            "type"=>$trans->type,
        ];
    }

    public function includeUser(ReferralTransaction $trans)
    {
        return $this->item($trans->user, new UserTransform());
    }

    public function includeReferralUser(ReferralTransaction $trans)
    {
        return $this->item($trans->referral_user, new UserTransform());
    }

    public function includeReferral(ReferralTransaction $trans)
    {
        return $this->item($trans->referral, new ReferralUserTransform());
    }
}
