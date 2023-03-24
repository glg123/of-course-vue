<?php

namespace App\Apidocs\Endpoints\Auth;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class SendResetPasswordEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('send reset password')
            ->desc('send reset password Code The Code Verify In 1 Hour only OR Use 824560')
            ->method('POST')
            ->group('auth')
            ->headers([
                'Content-Type' => 'application/json',
            ])
            ->body([
                'phone' => Param::type('string')->example('0105465787')->required(),
            ]);

        $this->example( [
            "phone" => "0109385484",
        ], 'send reset password Code 1 example');

        $this->returns(422, [
            'message' => 'The given data was invalid.',
            'errors' => [],
            ], 'Validation Message');

        $this->returns(200, [
            'message'=>__('messages.reset_code_sendSuccess'),
            "status" => true
        ], 'Success');
    }
}
