<?php

namespace App\Apidocs\Endpoints\Offer;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class CheckCopounEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Check If Valid Copoun')
            ->desc('Check If Valid Copoun')
            ->method('get')
            ->group('copoun')
            ->headers([
                'Content-Type' => 'application/json',
            ])->query([
                'varient_id' => Param::type('int'),
            ]);

        $this->returns(200, [
            "data"=>null,
            "message"=> "Copoun Invaild For This Package Varient",
            "status"=> false
        ], 'NotValid');

        $this->returns(200, [
            "data"=> [
                "id"=> 1,
                "name"=> "copoun 1",
                "description"=> "copoun 1",
                "status"=>1,
                "discount"=> 1,
                "discount_type"=> "amount",
                "max_use"=> 10,
                "used"=> 0,
                "start_at"=> null,
                "end_at"=> null,
                "min_order_total"=> 1,
                "image"=> null,
                "packages"=> null,
                "package_varients"=> null
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
