<?php

namespace App\Apidocs\Endpoints\Referral;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class ListReferralEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Get all Referrals ')
            ->desc('Get all Referrals package and varients')
            ->method('get')
            ->group('referral')
            ->headers([
                'Content-Type' => 'application/json',
            ])->query([
                'status' => Param::type('int'),
            ]);


        $this->returns(200, [
            "data"=> [
                "id"=> 1,
                "reference_id"=> "8961",
                "name"=> "referral 1",
                "additional_days"=> 0,
                "bonus"=> 0,
                "active"=> 1,
                "image"=> null,
                "all_package"=> 1,
                "packages"=> null,
                "package_varients"=> null,
                "variations"=> null,
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
