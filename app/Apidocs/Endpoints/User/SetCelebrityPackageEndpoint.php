<?php

namespace App\Apidocs\Endpoints\User;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class SetCelebrityPackageEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Set Celebrity Package For User')
            ->desc('Set Celebrity Package For User')
            ->method('POST')
            ->group('user')
            ->headers([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer {API_TOKEN}',
            ])->body([
                'celebrity_id' => Param::type('int')->example(1)->required(),
                'packages' => Param::type('array')->required(),
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
