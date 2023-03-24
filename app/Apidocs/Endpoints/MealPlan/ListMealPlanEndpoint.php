<?php

namespace App\Apidocs\Endpoints\MealPlan;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class ListMealPlanEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Get List Meal Plans')
            ->desc('Get List Meal Plans')
            ->method('get')
            ->group('mealPlan')
            ->headers([
                'Content-Type' => 'application/json',
            ]);



        $this->returns(200, [
            "data"=> [
                "id"=> 1,
                "name"=> "Miss Dayna Jenkins",
                "description"=> "Raheem Armstrong",
                "image"=> null,
                "reference"=> "1566",
                "status"=> 1,
                "created_by"=> null,
                "created_at"=> "2022-10-06T15:09:43.000000Z"
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
