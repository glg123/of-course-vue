<?php

namespace App\Apidocs\Endpoints\Address;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class DeleteAddressEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Delete User  Address')
            ->desc('Delete User Address')
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
