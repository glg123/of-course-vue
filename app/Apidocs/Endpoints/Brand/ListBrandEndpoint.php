<?php

namespace App\Apidocs\Endpoints\Brand;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class ListBrandEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Get List Brands')
            ->desc('get List Brands')
            ->method('get')
            ->group('brand')
            ->headers([
                'Content-Type' => 'application/json',
            ]);



        $this->returns(200, [
            "data"=> [
                [
                    "id"=> 1,
                    "name"=> "Audreanne Ernser MD",
                    "description"=> "Dr. Asha Reynolds DDS",
                    "image"=> null,
                    "status"=> 1,
                    "created_at"=> "2022-10-06T13=>03=>37.000000Z",
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
