<?php

namespace App\Apidocs\Endpoints\Auth;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class ConfirmVerifyAccountEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('confirm Verify account')
            ->desc('confirm Verify account Code The Code Verify In 1 Hour only')
            ->method('POST')
            ->group('auth')
            ->headers([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer {API_TOKEN}',
            ])
            ->body([
                'phone' => Param::type('string')->example('0105465787')->required(),
                'code' => Param::type('string')->example('15847')->required(),
            ]);

        $this->example( [
            "phone" => "0109385484",
            "code" => 2352,
        ], 'confirm verify account Code 1 example');

        $this->returns(422, [
            'message' => 'The given data was invalid.',
            'errors' => [],
            ], 'Validation Message');

        $this->returns(200, [
             "message"=>__('messages.Verified_Successfully'),
            "status" => true
        ], 'Success');
    }
}
