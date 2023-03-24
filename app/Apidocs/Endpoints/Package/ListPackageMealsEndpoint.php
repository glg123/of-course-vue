<?php

namespace App\Apidocs\Endpoints\Package;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class ListPackageMealsEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Get List packages Meals')
            ->desc('Get List packages Meals')
            ->method('get')
            ->group('package')
            ->headers([
                'Content-Type' => 'application/json',
            ]);


        $this->returns(200, [
            "data"=> [
                    "id"=> 1,
                    "category_name"=> "Filomena Leffler DVM",
                    "meal_category_id"=> 1,
                    "days"=> [
                        "monday"=> [
                            "1"=> [
                                "id"=> 1,
                                "name"=> "Jacynthe Cartwright",
                                "default"=> 0
                            ],
                            "2"=> [
                                "id"=> 2,
                                "name"=> "Ara Koepp",
                                "default"=> 1
                            ]
                            ],
                        "sunday"=> [
                            "1"=> [
                                "id"=> 1,
                                "name"=> "Jacynthe Cartwright",
                                "default"=> 0
                            ],
                            "2"=> [
                                "id"=> 2,
                                "name"=> "Ara Koepp",
                                "default"=> 1
                            ]
                            ],
                        "tuesday"=> [
                            "1"=> [
                                "id"=> 1,
                                "name"=> "Jacynthe Cartwright",
                                "default"=> 0
                            ],
                            "2"=> [
                                "id"=> 2,
                                "name"=> "Ara Koepp",
                                "default"=> 1
                            ]
                        ],
                        "thursday"=> [
                            "1"=> [
                                "id"=> 1,
                                "name"=> "Jacynthe Cartwright",
                                "default"=> 0
                            ],
                            "2"=> [
                                "id"=> 2,
                                "name"=> "Ara Koepp",
                                "default"=> 1
                            ]
                        ],
                        "wednesday"=> [
                            "1"=> [
                                "id"=> 1,
                                "name"=> "Jacynthe Cartwright",
                                "default"=> 0
                            ],
                            "2"=> [
                                "id"=> 2,
                                "name"=> "Ara Koepp",
                                "default"=> 1
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
