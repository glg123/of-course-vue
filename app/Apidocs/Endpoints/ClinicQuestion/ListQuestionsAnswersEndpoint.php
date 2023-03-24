<?php

namespace App\Apidocs\Endpoints\ClinicQuestion;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class ListQuestionsAnswersEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Get all Clinic Questions Answers Or Filter It ')
            ->desc('Get all Clinic Questions Answers Or Filter It ')
            ->method('get')
            ->group('clinic')
            ->headers([
                'Content-Type' => 'application/json',
            ])->query([
                'question_id' => Param::type('int'),
                'user_id' => Param::type('int'),
            ]);

        $this->returns(200, [
            "data"=> [
                "id"=> 1,
                "answer"=>" answer question",
                "comment"=> "comment",
                "rate"=> 1,
                "created_at"=> null,
                "user"=> null,
                "question"=> null
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
