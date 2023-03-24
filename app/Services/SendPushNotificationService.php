<?php

namespace App\Services;

use App\Http\Controllers\API\ApiResponse;
use App\Http\Controllers\Api\Helpers\ApiResponse as HelpersApiResponse;
use App\Models\Admin;
use App\Models\Notification;
use App\Models\PushNotification;
use App\Models\User as ModelsUser;
use FCM;
use Illuminate\Database\Eloquent\Model;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;

class SendPushNotificationService
{

    use HelpersApiResponse;



    public static function sendToAdmin($api_user, $title, $body, $type)
    {

        $admins = Admin::get();

        return self::send($api_user, $admins, $title, $body, $type);

    }

    public static function send($api_user, $users = [], $title, $body, $type, $user_data = [])
    {
        // dd(config('onsignal.app_id'));
        if (is_array($users) and count($users) == 0) {
            $users[] = $api_user;
        } else if (is_object($users) and $users->count() == 0) {
            $users->push($api_user);
        }

        $lang = $api_user->communication_language ?? 'ar';
        $content = array(
            "en" => json_decode($body)->$lang
        );

        $headings = array(
            "en" => json_decode($title)->$lang
        );
        
        if (is_array($users)) {
            $player_ids = array_pluck($users, 'device_token');

        } else {
            // $available_users = $users->filter(function ($user) {
            //     return $user->accept_global_notifications;
            // });
            $player_ids = $users->pluck('device_token')->toArray();
        }

        // $fields = array(
        //     'app_id' => config('onsignal.app_id'),
        //     'include_player_ids' => $player_ids,
        //     'data' => array_merge($user_data, [
        //         "type" => $type,
        //         'user_name' => $api_user->first_name,
        //         'user_id' => $api_user->id,
        //     ]),
        //     'send_after' => now()->addSeconds(3),
        //     'large_icon' => "ic_launcher_round.png",
        //     'contents' => $content,
        //     "headings" => $headings,
        // );

        // $fields = json_encode($fields);

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
        //     'Authorization: Basic ' . config('onsignal.rest_api_key')));
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        // curl_setopt($ch, CURLOPT_HEADER, FALSE);
        // curl_setopt($ch, CURLOPT_POST, TRUE);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);


        // if (count($player_ids)) {
        //     $response = curl_exec($ch);
        //     curl_close($ch);
        // }

        // $response = json_decode($response);
       
        $notifications = [];

        foreach ($users as $user) {
            array_push($notifications, [
                'title' => $title,
                'body' => $body,
                'token' => $user->device_token,
                'modelable_type' => $user->getTable(),
                'user_id' => $user->id,
                'type' => $type,
                'data' => json_encode($user_data),
                'created_at' => now(),
            ]);

        }

        static::save($notifications);

        return "Congratulations, push notification sent...";

    }

    public function cancel_latest_notifications($user_id)
    {
        $fields = array(
            'app_id' =>config('onsignal.app_id'),
        );

        $fields = json_encode($fields);

        $notification = Notification::where(['read_at' => null, 'player_id' => $user_id])->latest()->first();

        if ($notification and $notification->notification_id) {

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications/" . $notification->notification_id);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                'Authorization: Basic ' .config('onsignal.rest_api_key')));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

            $notification->delete();

            curl_exec($ch);
            curl_close($ch);

        }


        return true;

    }

    public function index(Model $pushNotification)
    {
        return $pushNotification->all();
    }


    public static function save($notifications)
    {
        Notification::insert($notifications);
    }

}
