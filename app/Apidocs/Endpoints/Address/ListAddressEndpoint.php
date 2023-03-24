<?php

namespace App\Apidocs\Endpoints\Address;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class ListAddressEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Get all User address')
            ->desc('Get all User address')
            ->method('get')
            ->group('address')
            ->headers([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer {API_TOKEN}',
            ]);

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
            "meta" => [
                "pagination" => [
                    "total" => 2,
                    "count" => 2,
                    "per_page" => 10,
                    "current_page" => 1,
                    "total_pages" => 1,
                    "links" => []
                ]
            ],
            "message" => __("messages.success"),
            "status" => true
        ], 'Success');
    }
}
