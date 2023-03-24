<?php

namespace App\Apidocs\Endpoints\Auth;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class SendVerifyCodeEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('resend verify account')
            ->desc('resend verify account Code The Code Verify In 1 Hour only OR Use 824560')
            ->method('POST')
            ->group('auth')
            ->headers([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer {API_TOKEN}',
            ]);

        $this->returns(402, [
            'message' => 'unauthenticated',
            ], 'Validation Message');

        $this->returns(200, [
            'message'=>__('messages.Code_sendSuccess'),
            "status" => true
        ], 'Success');
    }
}
