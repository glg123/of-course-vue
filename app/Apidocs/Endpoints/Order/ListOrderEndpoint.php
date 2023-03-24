<?php

namespace App\Apidocs\Endpoints\Order;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class ListOrderEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Get all User Orders')
            ->desc('Get all User Orders And Filter It')
            ->method('get')
            ->group('order')
            ->headers([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer {API_TOKEN}',
            ])->query([
                'status' => Param::type('string'),
                'active' => Param::type('int'),
                'user_id' => Param::type('int'),
                'type' => Param::type('int'),
                'shift' => Param::type('string'),
                'deilevry_id' => Param::type('int'),
            ]);

        $this->returns(200, [
            "data"=> [
            "id"=> 1,
            "tag"=> "Mrs. Martina Leffler",
            "status"=> "pending",
            "comment"=> "comment",
            "price"=> "0.00",
            "discount"=> "0.00",
            "total"=> "0.00",
            "start_at"=> "2022-10-23 13=>08=>52",
            "delivery_cost"=> "20.00",
            "delivery_at"=> "2022-10-23 13=>08=>52",
            "type"=> "delivery",
            "image"=> null,
            "shift_time"=> "evening",
            "days"=> [
                    "sunday",
                    "monday"
            ],
            "address"=> [
                    "jedha"=> "jedha",
                    "street"=> "street",
                    "building"=> "building"
            ],
            "variations"=> null,
            "user"=> [
                "data"=> [
                    "id"=> 3,
                    "first_name"=> "user",
                    "last_name"=> "user",
                    "address"=> [
                        [
                            "jedha"=> "Jedha",
                            "shift"=> "evening",
                            "street"=> "Street",
                            "comment"=> "comment",
                            "address_type"=> "office",
                            "floor_number"=> "10",
                            "house_number"=> "1",
                            "apartment_number"=> "10"
                        ],
                        [
                            "jedha"=> "Jedha1",
                            "shift"=> "evening1",
                            "street"=> "Street1",
                            "comment"=> "comment1",
                            "address_type"=> "office1",
                            "floor_number"=> "100",
                            "house_number"=> "10",
                            "apartment_number"=> "100"
                        ]
                    ],
                    "image"=> null,
                    "roles"=> [
                        "customer"
                    ],
                    "is_verified"=> false
                ]
            ],
            "package"=> [
                "data"=> [
                    "id"=> 1,
                    "name"=> "package 1",
                    "description"=> "desc package 1",
                    "image"=> null,
                    "status"=> 1,
                    "show_order"=> 1,
                    "is_celebrity"=> 1,
                    "start_at"=> "2022-10-19",
                    "variations"=> [
                        "fat"=> 100,
                        "carbs"=> 100,
                        "protein"=> 100
                    ]
                ]
            ],
            "package_varient"=> [
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
                                "meal_category"=> "Tara Balistreri",
                                "times"=> 2
                            ],
                            "2"=> [
                                "id"=> 2,
                                "meal_category"=> "Carlos Gutkowski",
                                "times"=> 1
                            ]
                        ],
                        "sunday"=> [
                            "1"=> [
                                "id"=> 1,
                                "meal_category"=> "Tara Balistreri",
                                "times"=> 2
                            ],
                            "2"=> [
                                "id"=> 2,
                                "meal_category"=> "Carlos Gutkowski",
                                "times"=> 1
                            ]
                        ]
                    ],
                    "offers"=> []
                ]
            ],
            "copoun"=> [
                "data"=> [
                    "id"=> 1,
                    "name"=> "Jacques O'Connell III",
                    "code"=> "5",
                    "description"=> "Laurence Glover",
                    "status"=> 1,
                    "discount"=> "10.00",
                    "discount_type"=> "amount",
                    "max_use"=> 10,
                    "used"=> 17,
                    "start_at"=> "2022-10-18",
                    "end_at"=> "2022-11-19",
                    "min_order_total"=> null,
                    "image"=> null
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
