<?php

namespace App\Apidocs\Endpoints\Review;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class DelReviewEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Delete User  Review')
            ->desc('Delete User  Review')
            ->method('POST')
            ->group('review')
            ->headers([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer {API_TOKEN}',
            ]);

            $this->returns(402, [
            'message' => 'unauthenticated',
            ], 'Validation Message');

            $this->returns(200, [
                "message"=> __("messages.success"),
                "status"=> true
            ], 'Success');
    }
}
