<?php

namespace App\Apidocs\Endpoints\Referral;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class SetReferralUserEndpoint extends Endpoint
{
    public function describe(): void
    {
        $this->title('Set  Referrals Users ')
            ->desc('Set or get  Referral User')
            ->method('post')
            ->group('referral')
            ->headers([
                'Content-Type' => 'application/json',
            ]);


        $this->returns(200, [
            "data"=> [
                "id"=> 1,
                "reference_id"=> "8961",
                "code"=> "referral 1",
                "active"=> 1,
                "image"=> null,
                "created_at"=> 1,
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
