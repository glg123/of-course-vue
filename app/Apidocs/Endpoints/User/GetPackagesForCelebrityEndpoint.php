<?php

namespace App\Apidocs\Endpoints\User;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class GetPackagesForCelebrityEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('get Celebrity User Package')
            ->desc('get Celebrity User Package')
            ->method('get')
            ->group('user')
            ->headers([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer {API_TOKEN}',
            ])->body([
                'dietitian_id' => Param::type('string')->example('mohamed')->required(),
                'date' => Param::required(),
                'time' => Param::required(),
                'payment_status' => Param::required(),
                'payment_method' => Param::required(),
            ]);

        $this->returns(402, [
            'message' => 'unauthenticated',
            ], 'Validation Message');
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
