<?php

namespace App\Apidocs\Endpoints\Meal;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class ListMealEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Get List Meal ')
            ->desc('Get List Meal')
            ->method('get')
            ->group('meal')
            ->headers([
                'Content-Type' => 'application/json',
            ]);


        $this->returns(200, [
            "data"=> [
                "id"=> 1,
                "name"=> "Jacynthe Cartwright",
                "description"=> "Eda Abshire",
                "image"=> null,
                "code"=> "3897",
                "active"=> 1,
                "in_app"=> 1,
                "variations"=> [
                    "fat"=> 100,
                    "carb"=> 100,
                    "protein"=> 100,
                    "calories"=> 100
                ],
                "settings"=> ["saturday","sunday","monday","tuesday","wednesday","thursday","friday"],
                "created_by"=> null,
                "categories"=> null,
                "diet_plans"=> null,
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
