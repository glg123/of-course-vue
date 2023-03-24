<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Referral;
use Illuminate\Support\Str;
use App\Models\ReferralUser;
use App\Models\RegisterCode;
use App\Models\ReferralTransaction;
use App\Services\SendPushNotificationService;
use App\Services\SendSmsService;

class RegisterCodeObserve
{
    public function __construct()
    {
        $this->sendPushNotificationService = new SendPushNotificationService;
        $this->sendSmsService = new SendSmsService;
    }

    public function creating(RegisterCode $registerCode){
        $registerCode->code = mt_rand(10000,99999);
        $registerCode->expired_at = now()->addHour();
    }

    
    public function created(RegisterCode $registerCode)
    {
        if (env('APP_ENV','local') != 'local') {

            if ($registerCode->via == 'sms') {
                // $this->sendSmsService->send($registerCode->user,'Your Registration Code',$registerCode->code);
            }elseif($registerCode->via == 'email'){

            }

        }
        

    }

    public function updated(User $user)
    {
        if($user->isDirty('verified_at') && $user->verified_at){
              RegisterCode::verify()->whereUserId($user->id)->delete();
        }
    }

    public function ReferralUserCode($user)
    {
        $referralUser = ReferralUser::whereCode($user->employee_code)->first();
        ReferralTransaction::create([
                'referral_id'      => $referralUser->id,
                'code'             => $referralUser->code,
                'referral_user_id' => $referralUser->user_id,
                'user_id'          => $user->id,
                'type'             => 'register',
        ]);
        $user->update(['by_employee'=>$referralUser->user_id]);
    }
}
