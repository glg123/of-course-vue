<?php

namespace App\Apidocs\Endpoints\User;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class ListUserEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Fetch User')
            ->desc('Get all users By Role')
            ->method('get')
            ->group('user')
            ->headers([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer {API_TOKEN}',
            ])->query([
                'role' => Param::type('string'),
            ]);

        $this->returns(200, [
            "data"=> [
                "id"=> 1,
                "date"=>" date",
                "time"=> "time",
                "payment_method"=> 'offline',
                "payment_status"=> "pending",
                "created_at"=> null,
                "user"=> null,
                "dietitian"=> null,

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
