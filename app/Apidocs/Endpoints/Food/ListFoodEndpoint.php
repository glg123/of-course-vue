<?php

namespace App\Apidocs\Endpoints\Food;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class ListFoodEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Get List foods')
            ->desc('get List foods')
            ->method('get')
            ->group('food')
            ->headers([
                'Content-Type' => 'application/json',
            ]);



        $this->returns(200, [
            "data"=> [
                "id"=> 1,
                "name"=> "Alexandrea Romaguera",
                "description"=> "Blanche Mills",
                "image"=> null,
                "code"=> "83401",
                "calory"=> "100.00",
                "serve"=> "100.00",
                "stock"=> null,
                "stock_reminder"=> "0.00",
                "price"=> "0.00",
                "is_component"=> 1,
                "is_liked"=> 1,
                "variations"=> [
                    "fat"=> 20,
                    "protein"=> 20,
                    "carb"=> 50
                    ],
                "created_by"=> null,

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
