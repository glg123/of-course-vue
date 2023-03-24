<?php

namespace App\Apidocs\Endpoints\MealCategory;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class ListMealCategoryEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Get List Meal Categories')
            ->desc('Get List Meal Categories')
            ->method('get')
            ->group('meaCategory')
            ->headers([
                'Content-Type' => 'application/json',
            ]);



        $this->returns(200, [
            "data"=> [
                "id"=> 1,
                "name"=> "Norberto Pagac",
                "description"=> "Briana Ruecker DVM",
                "reference"=> "1355",
                "image"=> null,
                "status"=> 1,
                "variations"=> [
                    "has_carb"=> true
                ],
                "created_by"=> null,
                "created_at"=> "2022-10-06T15:00:44.000000Z"

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
