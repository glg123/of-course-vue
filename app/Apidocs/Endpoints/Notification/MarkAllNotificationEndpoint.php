<?php

namespace App\Apidocs\Endpoints\Notification;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class MarkAllNotificationEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Mark All Notifications')
            ->desc('Mark All NotificationEndpoints')
            ->method('get')
            ->group('notification')
            ->headers([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer {API_TOKEN}',
            ]);


        $this->returns(200, [
            "message"=> __("messages.success"),
            "status"=> true
        ], 'Success');
    }
}
