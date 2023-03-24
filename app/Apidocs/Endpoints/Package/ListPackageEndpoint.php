<?php

namespace App\Apidocs\Endpoints\Package;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class ListPackageEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Get List packages ')
            ->desc('Get List packages')
            ->method('get')
            ->group('package')
            ->headers([
                'Content-Type' => 'application/json',
            ]);


        $this->returns(200, [
            "data"=> [
                "id"=> 1,
                "name"=> "package 1",
                "description"=> "desc package 1",
                "image"=> null,
                "status"=> 1,
                "show_order"=> 1,
                "is_celebrity"=> 1,
                "start_at"=> "2022-10-10",
                "variations"=> [
                    "fat"=> 100,
                    "carbs"=> 100,
                    "protein"=> 100
                ],
                "diet_plan"=> [
                    "data"=> [
                        "id"=> 1,
                        "name"=> "Luisa Huels",
                        "description"=> "Dolores Johnson II",
                        "image"=> null,
                        "reference"=> "4407",
                        "status"=> 1
                    ]
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
