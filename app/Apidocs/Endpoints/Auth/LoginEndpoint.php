<?php

namespace App\Apidocs\Endpoints\Auth;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class LoginEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Login')
            ->desc('Login To Our App ')
            ->method('POST')
            ->group('auth')
            ->headers([
                'Content-Type' => 'application/json',
            ])
            ->body([
                'phone' => Param::type('string')->example('0105465787')->required(),
                'password' => Param::type('string')->example(12345678)->required(),
            ]);

        $this->example( [
            "phone" => "0109385484",
            "password" => "57878647",
        ], 'Login 1 example');

        $this->returns(422, [
            'message' => 'The given data was invalid.',
            'errors' => [],
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
