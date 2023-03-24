<?php

namespace App\Apidocs\Endpoints\ForbiddenFood;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class SetUserForbiddenFoodEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Set  Food Type For User')
            ->desc('Set  Food Type For User')
            ->method('POST')
            ->group('F-food')
            ->headers([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer {API_TOKEN}',
            ])->body([
                'type' => Param::type('int')->example([
                    'dislikeType' => 1,
                    'likeType' => 2
                ])->required(),
                'food_id' => Param::type('int')->required(),
            ]);

        $this->returns(402, [
            'message' => 'unauthenticated',
        ], 'Validation Message');

        $this->returns(200, [
            "data" => [
                "id" => 1,
                "type" => 1,
                "varitaions" => null,
                "created_at" => null,
                "user" => null,
                "food" => null,
            ],
            "message" => __("messages.success"),
            "status" => true
        ], 'Success');
    }
}
