<?php

namespace App\Apidocs\Endpoints\Offer;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class ListOffersEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Get all Offers ')
            ->desc('Get all Offers')
            ->method('get')
            ->group('copoun')
            ->headers([
                'Content-Type' => 'application/json',
            ])->query([
                'status' => Param::type('int'),
                'copoun_id' => Param::type('int'),
            ]);

        $this->returns(200, [
            "data"=> [
                "id"=> 1,
                "status"=> 1,
                "start_at"=> null,
                "end_at"=>null,
                "image"=> 1,
                "copoun"=> null,
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
