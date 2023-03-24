<?php

namespace App\Apidocs\Endpoints\Referral;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class ListReferralUserEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Get all Referrals Users ')
            ->desc('Get all Referrals Users')
            ->method('get')
            ->group('referral')
            ->headers([
                'Content-Type' => 'application/json',
            ])->query([
                'status' => Param::type('int'),
                'user_id' => Param::type('int'),
            ]);


        $this->returns(200, [
            "data"=> [
                "id"=> 1,
                "reference_id"=> "8961",
                "code"=> "referral 1",
                "active"=> 1,
                "image"=> null,
                "created_at"=> 1,
                "user"=> null
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
