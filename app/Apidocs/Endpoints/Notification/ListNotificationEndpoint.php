<?php

namespace App\Apidocs\Endpoints\Notification;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class ListNotificationEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Get List User Notifications ')
            ->desc('Get List User Notifications')
            ->method('get')
            ->group('notification')
            ->headers([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer {API_TOKEN}',
            ]);


        $this->returns(200, [
            "data"=> [
                "id"=> 2,
                "title"=> [
                    "ar"=> " مرحبا بك  فى تطبيقنا ",
                    "en"=> "Welcome  In Our Application"
                ],
                "body"=> [
                    "ar"=> " مرحبا بك  فى تطبيقنا ",
                    "en"=> "Welcome  In Our Application"
                ],
                "type"=> "registeration",
                "modelable_type"=> "users",
                "read_at"=> null,
                "data"=> [],
                "created_at"=> null
            ],
            "meta"=> [
                "pagination"=> [
                    "total"=> 2,
                    "count"=> 2,
                    "per_page"=> 10,
                    "current_page"=> 1,
                    "total_pages"=> 1,
                    "links"=> []
                ]
                ],
            "message"=> __("messages.success"),
            "status"=> true
        ], 'Success');
    }
}
