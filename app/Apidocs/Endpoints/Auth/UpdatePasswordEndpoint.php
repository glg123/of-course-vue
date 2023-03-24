<?php

namespace App\Apidocs\Endpoints\Auth;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class UpdatePasswordEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('update Password ')
            ->desc('update Password user')
            ->method('POST')
            ->group('auth')
            ->headers([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer {API_TOKEN}',
            ])
            ->body([
                'password' => Param::type('string')->example(12345678)->required(),
                'password_confirmation' => Param::type('string')->example(12345678)->required(),
            ]);

        $this->example( [
            "password" => "57878647",
            "password_confirmation" => "57878647",
        ], 'update password 1 example');

        $this->returns(422, [
            'message' => 'The given data was invalid.',
            'errors' => [],
            ], 'Validation Message');

        $this->returns(200, [
             "message"=>__('messages.reset_code_sendSuccess'),
            "status" => true
        ], 'Success');
    }
}
