<?php

namespace App\Apidocs\Endpoints\Auth;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class ConfirmResetPasswordEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('confirm reset password')
            ->desc('confirm reset password Code The Code Verify In 1 Hour only')
            ->method('POST')
            ->group('auth')
            ->headers([
                'Content-Type' => 'application/json',
            ])
            ->body([
                'phone' => Param::type('string')->example('0105465787')->required(),
                'code' => Param::type('string')->example('15847')->required(),
            ]);

        $this->example( [
            "phone" => "0109385484",
            "code" => 2352,
        ], 'confirm reset password Code 1 example');

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
