<?php

namespace App\Apidocs\Endpoints\Review;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class ShowReviewEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Show  User Review')
            ->desc('Show  User Review')
            ->method('get')
            ->group('review')
            ->headers([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer {API_TOKEN}',
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
                "user"=> null,      
                "item"=>null,
            ],
            "message"=> __("messages.success"),
            "status"=> true
        ], 'Success');
    }
}
