<?php

namespace App\Apidocs\Endpoints\Unit;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class ListUnitEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Get List Units')
            ->desc('get List Units')
            ->method('get')
            ->group('unit')
            ->headers([
                'Content-Type' => 'application/json',
            ]);



        $this->returns(200, [
            "data"=> [
                [
                    "id"=> 1,
                    "name"=> "unit 1",
                    "description"=> "unit 2",
                    "created_at"=> "2022-10-06T12=>02=>53.000000Z",
                    "created_by"=> null
                ]
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
