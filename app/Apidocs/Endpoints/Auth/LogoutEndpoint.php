<?php

namespace App\Apidocs\Endpoints\Auth;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class LogoutEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('logout')
            ->desc('logout auth user ')
            ->method('post')
            ->group('auth')
            ->headers([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer {API_TOKEN}',
            ]);

           $this->returns(402, [
            'message' => 'unauthenticated',
            ], 'Validation Message');

            $this->returns(200, [
                'message'=>__('messages.reset_code_sendSuccess'),
                "status" => true
            ], 'Success');
    }
}
