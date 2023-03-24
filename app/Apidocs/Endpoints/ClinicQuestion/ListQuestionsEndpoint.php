<?php

namespace App\Apidocs\Endpoints\ClinicQuestion;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class ListQuestionsEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Get all Clinic Questions ')
            ->desc('Get all Clinic Questions')
            ->method('get')
            ->group('clinic')
            ->headers([
                'Content-Type' => 'application/json',
            ])->query([
                'status' => Param::type('int'),
            ]);

        $this->returns(200, [
            "data"=> [
                "id"=> 1,
                "question"=>" test question",
                "is_editable"=> 1,
                "status"=> 1,
                "tag"=> "tag",
                "order"=> 1,
                "frequency"=> [
                    [
                        "title"=> "end_date"
                    ],
                    [
                        "title"=> "middle_date"
                    ],
                    [
                        "title"=> "start_date"
                    ],
                    [
                        "title"=> "daily"
                    ]
                ],
                "answer_type"=> "multi_choice",
                "choices"=> [
                    [
                        "title"=> "yes"
                    ],
                    [
                        "title"=> "no"
                    ],
                    [
                        "title"=> "اها"
                    ]
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
