<?php

namespace App\Apidocs\Endpoints\Auth;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class ProfileEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Profile ')
            ->desc('get auth user profile')
            ->method('get')
            ->group('auth')
            ->headers([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer {API_TOKEN}',
            ]);

           $this->returns(402, [
            'message' => 'unauthenticated',
            ], 'Validation Message');

        $this->returns(200, [
             'data' => [
                "first_name"=> "qwr",
                "last_name"=> "sdwf",
                "id"=> 3,
                "is_verified"=> false,
                "api_token"=> "token...."
            ],
            "status" => true
        ], 'Success');
    }
}
