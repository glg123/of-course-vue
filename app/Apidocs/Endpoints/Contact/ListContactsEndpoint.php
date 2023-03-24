<?php

namespace App\Apidocs\Endpoints\Contact;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class ListContactsEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Get all Contact Methods ')
            ->desc('Get all Contact Methods To User')
            ->method('get')
            ->group('contact')
            ->headers([
                'Content-Type' => 'application/json',
            ]);


        $this->returns(200, [
            "data"=> [
                "id"=> 1,
                "name"=> "contact 1",
                "created_at"=> null
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
