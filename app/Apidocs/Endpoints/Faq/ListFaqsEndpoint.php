<?php

namespace App\Apidocs\Endpoints\Faq;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class ListFaqsEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Get all Faqs ')
            ->desc('Get all Faqs answer')
            ->method('get')
            ->group('faq')
            ->headers([
                'Content-Type' => 'application/json',
            ])->query([
                'status' => Param::type('int'),
            ]);


        $this->returns(200, [
            "data"=> [
                "id"=> 1,
                "title"=> "title 1",
                "question"=> "que 1",
                "answer"=> "answer 1",
                "status"=> 1,
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
