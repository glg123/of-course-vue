<?php

namespace App\Apidocs\Endpoints\Order;

use Johnylemon\Apidocs\Facades\Param;
use Johnylemon\Apidocs\Endpoints\Endpoint;

class UpdateOrderEndpoint extends Endpoint
{
    public function describe(): void
    {

        $this->title('Update User  Order')
            ->desc('Update User Order')
            ->method('POST')
            ->group('order')
            ->headers([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer {API_TOKEN}',
            ])->body([
                'delivery_id' =>  Param::type('int')->example(1),
                'trainer_id' =>  Param::type('int')->example(1),
                'meal_id' =>  Param::type('int')->example(1),
                'package_varient_id' =>  Param::type('int')->example(1),
                'user_subscription_id' =>  Param::type('int')->example(1),
                'tag_id' =>  Param::type('int')->example(1)->required(),
                'area_id' =>  Param::type('int')->example(1)->required(),
                'block_id' =>  Param::type('int')->example(1)->required(),
                'zone_id' =>  Param::type('int')->example(1)->required(),
                'shift_time' =>  Param::type('string')->example(['evening','morning'])->required(),
                'comment' =>  Param::type('string')->example(1),
                'delivery_cost' =>  Param::type('string')->example(1),
                'price' =>  Param::type('string')->example(1),
                'discount' =>  Param::type('string')->example(1),
                'total' =>  Param::type('string')->example(1),
                'start_at' =>  Param::type('string')->example(1),
                'delivery_at' =>  Param::type('string')->example(1),
                'type' =>  Param::type('string')->example('delivery'),
                'address' =>  Param::type('array'),
                'days' =>  Param::type('array'),
                'meals' =>  Param::type('array'),
                'variations' =>  Param::type('array'), 
                'image' =>  Param::type('image')->example(1),
              
            ]);

            $this->returns(402, [
            'message' => 'unauthenticated',
            ], 'Validation Message');

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
                "user"=> null,      
                "trainer"=>null,
                "delivery"=>null,
                "meal"=>null,
                "meals"=>null,
                "user_subscription"=>null,
                "package_varient"=>null,
                ],
                "message"=> __("messages.success"),
                "status"=> true
            ], 'Success'); 
    }
}
