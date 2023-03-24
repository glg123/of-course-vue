<?php

namespace App\Apidocs\Endpoints\Tag;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class ListTagEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Get List Tags ')
            ->desc('get List Tags By Type Type 1 => meals, Type 2 => Customer')
            ->method('get')
            ->group('tag')
            ->headers([
                'Content-Type' => 'application/json',
            ])->query([
                'type' => Param::type('int'),
            ]);

        $this->returns(200, [
            "data"=> [
                [
                    "id"=> 1,
                    "name"=> "type 1",
                    "type"=> 1,
                    "created_at"=> "2022-10-06T12=>02=>53.000000Z",
                    "created_by"=> null
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
