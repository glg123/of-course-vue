<?php

namespace App\Apidocs\Endpoints\Location;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class ListZonesEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Get all location Zones')
            ->desc('Get all location Zones')
            ->method('get')
            ->group('location')
            ->headers([
                'Content-Type' => 'application/json',
            ])->query([
                'area_id' => Param::type('int'),
                'status' => Param::type('int'),
            ]);


        $this->returns(200, [
            "data"=> [
                "id"=> 1,
                "name"=> "zone 1",
                "status"=> 1
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
