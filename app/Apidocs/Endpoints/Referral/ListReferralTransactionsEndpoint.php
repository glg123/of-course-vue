<?php

namespace App\Apidocs\Endpoints\Referral;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class ListReferralTransactionsEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Get all Referrals Transactions')
            ->desc('Get all Referrals Transactions')
            ->method('get')
            ->group('referral')
            ->headers([
                'Content-Type' => 'application/json',
            ])->query([
                'user_id' => Param::type('int'),
                'referral_user' => Param::type('int'),
                'referral' => Param::type('int'),
            ]);


        $this->returns(200, [
            "data"=> [
                "id"=> 1,
                "reference_id"=> "8961",
                "name"=> "referral 1",
                "code"=> 0,
                "price"=> 0,
                "type"=> 'register',
                "user"=> null,
                "referral"=> null,
                "referral_user"=> null,
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
