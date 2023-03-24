<?php

namespace App\Apidocs\Endpoints\ForbiddenFood;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class ListUserForbiddenFoodEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Fetch User  Food Like/Dislike')
            ->desc('Get all users By Role')
            ->method('get')
            ->group('F-food')
            ->headers([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer {API_TOKEN}',
            ])->query([
                'type' => Param::type('int')->example([
                    'dislikeType'=>1,
                    'likeType'=>2,
                ]),
            ]);

        $this->returns(200, [
            "data"=> [
                "id"=> 1,
                "type"=>1,
                "varitaions"=> null,
                "created_at"=>null,
                "user"=> null,
                "food"=> null,
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
