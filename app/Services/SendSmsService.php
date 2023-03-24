<?php

namespace App\Services;

use App\Http\Controllers\API\ApiResponse;
use App\Http\Controllers\Api\Helpers\ApiResponse as HelpersApiResponse;
use App\Models\Admin;
use App\Models\Notification;
use App\Models\PushNotification;
use App\Models\User as ModelsUser;
use CMText\Channels;
use CMText\Message;
use CMText\RichContent\Messages\MediaMessage;
use CMText\RichContent\Suggestions\ReplySuggestion;
use CMText\TextClient;
use FCM;
use Illuminate\Database\Eloquent\Model;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;

class SendSmsService
{

    use HelpersApiResponse;





    public static function send($api_user, $title, $body)
    {
        
        $client = new TextClient(config('cm-sms.sms-api-key'));
        $message = new Message($title.'<br>'.$body, config('cm-sms.sms-sender-name'), [$api_user->phone_number]);
        $message
            ->WithChannels([Channels::SMS])
            // ->WithHybridAppKey('your-secret-hybrid-app-key')
            ->WithRichMessage(
                new MediaMessage(
                    'cm.com',
                    'https://avatars3.githubusercontent.com/u/8234794?s=200&v=4',
                    'image/png'
                )
            )
            ->WithSuggestions([
                new ReplySuggestion('Opt In', 'OK'),
                new ReplySuggestion('Opt Out', 'STOP'),
            ]);
        $result = $client->send([$message]);
        // dd($result);

        // static::save($notifications);

        return "Congratulations, Sms Message Sent...";

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
