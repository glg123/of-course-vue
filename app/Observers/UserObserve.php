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

class UserObserve
{
    public function __construct()
    {
        $this->sendPushNotificationService = new SendPushNotificationService;
        $this->sendSmsService = new SendSmsService;
    }

    public function creating(User $user)
    {
        $user->device_token = self::generateUniqueDeviceToken();
    }

    public function generateUniqueDeviceToken()
    {
        do {
            $code = Str::random(rand(5, 35));
        } while (User::where('device_token', $code)->exists());
        return $code;
    }


    public function created(User $user)
    {
        if ($user->employee_code) {
            $this->ReferralUserCode($user);
        }

        RegisterCode::create([
            'user_id' => $user->id,
            'via'    => 'sms',
        ]);

        if (env('APP_ENV', 'local') != 'local') {
            //Notification
            // // $title = json_encode(["en" => "Welcome {$user->name} In Our Application", "ar" => " مرحبا بك {$user->name} فى تطبيقنا "], JSON_UNESCAPED_UNICODE);
            // $this->sendPushNotificationService->send($user, [], $title, $title, 'registeration');
        }
    }

    public function updated(User $user)
    {
        if ($user->isDirty('verified_at') && $user->verified_at) {
            RegisterCode::verify()->whereUserId($user->id)->delete();
            ReferralUser::firstOrCreate(['user_id' => $user->id], ['reference_id' => rand(1, 1000)]);
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

        $user->update(['by_employee' => $referralUser->user_id]);
    }
}
