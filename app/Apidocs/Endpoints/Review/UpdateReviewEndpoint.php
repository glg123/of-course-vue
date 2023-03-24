<?php

namespace App\Apidocs\Endpoints\Review;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class UpdateReviewEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Update User  Review')
            ->desc('Update User Review')
            ->method('POST')
            ->group('review')
            ->headers([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer {API_TOKEN}',
            ])->body([
                'score' =>  Param::type('int')->example(1),
                'title' =>  Param::type('string')->example(1),
                'review' =>  Param::type('string')->example(1),
                'days' =>  Param::type('array'),
                'variations' =>  Param::type('array'), 
              
            ]);

            $this->returns(402, [
            'message' => 'unauthenticated',
            ], 'Validation Message');

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
