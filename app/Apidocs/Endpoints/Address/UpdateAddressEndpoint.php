<?php

namespace App\Apidocs\Endpoints\Address;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class UpdateAddressEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Update User  address')
            ->desc('update User  address')
            ->method('POST')
            ->group('address')
            ->headers([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer {API_TOKEN}',
            ])->body([
                'area_id' => Param::type('integer')->example('mohamed'),
                'block_id' => Param::type('integer')->example('mohamed'),
                'time' => Param::type('string')->example('evening'),
                'map_long' => Param::type('string')->example('215848415'),
                'map_lat' => Param::type('string')->example('215848415'),
                'map_zoom' => Param::type('string')->example('215848415'),
                'address' => Param::type('array')->example([
                    "street" => "Street",
                    "jedha" => "Jedha",
                    "house_number" => "1",
                    "floor_number" => "10",
                    "apartment_number" => "10",
                    "address_type" => "office",
                    "comment" => "comment"
                ])
            ]);

        $this->returns(402, [
            'message' => 'unauthenticated',
        ], 'Validation Message');

        $this->returns(200, [
            "data" => [
                "id" => 2,
                "area_id" => null,
                "block_id" => null,
                "time" => "evening",
                "map_lat" => "215848415",
                "map_long" => "215848415",
                "map_zoom" => "215848415",
                "address" => [
                    "jedha" => "Jedha",
                    "street" => "Street",
                    "comment" => "comment",
                    "address_type" => "office",
                    "floor_number" => "10",
                    "house_number" => "1",
                    "apartment_number" => "10"
                ],
                "is_default" => true,
                "default_requested" => false
            ],
            "message" => __("messages.success"),
            "status" => true
        ], 'Success');
    }
}
