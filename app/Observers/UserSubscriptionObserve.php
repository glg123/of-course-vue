<?php

namespace App\Observers;

use App\Models\PackageVarient;
use App\Models\User;
use App\Models\Referral;
use Illuminate\Support\Str;
use App\Models\ReferralUser;
use App\Models\RegisterCode;
use App\Models\UserSubscription;
use App\Models\ReferralTransaction;

class UserSubscriptionObserve
{

    public function creating(UserSubscription $userSubscription)
    {

        $varientPrice = PackageVarient::findOrFail($userSubscription->package_varient_id)->price;

        $userSubscription->price = $varientPrice - ($userSubscription->discount ?? 0);
        $userSubscription->total = $userSubscription->price * ($userSubscription->qty ?? 1);
    }


    public function created(UserSubscription $userSubscription)
    {
        if ($userSubscription->referral_code != null) {
            $this->ReferralUserCode($userSubscription);
        }

        $this->updateSubscriptionStatus($userSubscription);

        if ($userSubscription->copoun_id) {
            $userSubscription->copoun->update(['used' => $userSubscription->copoun->used + 1]);
        }
    }



    public function ReferralUserCode($userSubscription)
    {
        $referralUser = ReferralUser::whereCode($userSubscription->referral_code)->first();
        if ($referralUser) {
            ReferralTransaction::create([
                'referral_id'      => $referralUser->id,
                'code'             => $referralUser->code,
                'referral_user_id' => $referralUser->user_id,
                'user_id'          => $userSubscription->user_id,
                'package_id'       => $userSubscription->package_id,
                'varient_id'       => $userSubscription->package_varient_id,
                'subscription_id'  => $userSubscription->subscription_id,
                'type'             => 'subscription',
            ]);
        }
    }

    public function updateSubscriptionStatus($userSubscription)
    {
        UserSubscription::where('id', '!=', $userSubscription->id)->where('user_id', $userSubscription->user_id)->update(['active' => false]);
    }
}
