<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\Meal;
use App\Models\User;
use App\Models\Zone;

use App\Models\Order;
use App\Models\Location;
use App\Models\PackageVarient;
use App\Models\UserSubscription;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id" =>User::first()->id,
            "modelable_type" =>Order::class,
            "modelable_id" =>Order::first()->id,
            "type" => 'order',
            "score" =>1,
            "title" =>'asdf',
            "review" =>'asdf',
            "answer" =>'asdf',
            "title" =>'asdf',
            "days" =>[
                'sunday','monday'
            ]
        ];
    }


}
