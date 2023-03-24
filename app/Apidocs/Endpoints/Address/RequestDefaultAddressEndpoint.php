<?php

namespace App\Apidocs\Endpoints\Address;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class RequestDefaultAddressEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('request default User  Address')
            ->desc('request default User Address')
            ->method('POST')
            ->group('address')
            ->headers([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer {API_TOKEN}',
            ]);

        $this->returns(402, [
            'message' => 'unauthenticated',
        ], 'Validation Message');

        $this->returns(200, null, 'Success');
    }
}
