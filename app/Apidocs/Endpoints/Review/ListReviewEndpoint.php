<?php

namespace App\Apidocs\Endpoints\Review;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class ListReviewEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Get all User review')
            ->desc('Get all User review And Filter It')
            ->method('get')
            ->group('review')
            ->headers([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer {API_TOKEN}',
            ])->query([
                'status' => Param::type('string'),
                'user_id' => Param::type('int'),
                'type' => Param::type('string'),
            ]);

        $this->returns(200, [
            "data"=> [
            "id"=> 1,
            "status"=> false,
            "type"=> "order",
            "score"=> "1",
            "title"=> "asdf",
            "review"=> "asdf",
            "answer"=> "asdf",
            "days"=> [
                "sunday",
                "monday"
            ],
            "variations"=> null,
            "user"=> null
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
