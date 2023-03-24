<?php

namespace App\Apidocs\Endpoints\Package;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class ListPackageVarientsEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Get List packages Varients')
            ->desc('Get List packages Varients')
            ->method('get')
            ->group('package')
            ->headers([
                'Content-Type' => 'application/json',
            ]);


        $this->returns(200, [
            "data"=> [
                "id"=> 1,
                "name"=> "ad",
                "days_available"=> 10,
                "price"=> "10.00",
                "avg_price"=> "10.00",
                "days"=> [
                    "monday"=> [
                        "1"=> [
                            "id"=> 1,
                            "name"=> "Filomena Leffler DVM",
                            "times"=> 2
                        ],
                        "2"=> [
                            "id"=> 2,
                            "name"=> "Prof. Jayden Daniel",
                            "times"=> 1
                        ]
                    ],
                    "sunday"=> [
                        "1"=> [
                            "id"=> 1,
                            "name"=> "Filomena Leffler DVM",
                            "times"=> 2
                        ],
                        "2"=> [
                            "id"=> 2,
                            "name"=> "Prof. Jayden Daniel",
                            "times"=> 1
                        ]
                    ]
                ]
            ],
            "meta"=> [
                "pagination"=> [
                    "total"=> 2,
                    "count"=> 2,
                    "per_page"=> 10,
                    "current_page"=> 1,
                    "total_pages"=> 1,
                    "links"=> []
                ]
                ],
            "message"=> __("messages.success"),
            "status"=> true
        ], 'Success');
    }
}
