<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Tag;
use App\Models\Meal;
use App\Models\User;
use App\Models\Zone;
use App\Models\Offer;
use App\Models\Copoun;
use App\Models\Package;
use App\Models\Location;
use App\Models\Referral;
use App\Models\ReferralUser;
use App\Models\PackageVarient;
use App\Models\UserSubscription;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id" => User::first()->id,
            "delivery_id" => User::first()->id,
            "trainer_id" => User::first()->id,
            "package_varient_id" => PackageVarient::first()->id,
            "tag_id" => Tag::first()->id,
            "user_subscription_id" => UserSubscription::first()->id,
            "status" => 'pending',
            "delivery_cost" => 20,
            "comment" => 'comment',
            "start_at" => now(),
            "delivery_at" => now(),
            "type" => 'delivery',
            "shift_time" => 'evening',
            "meals" => Meal::pluck('id')->toArray(),
            "address_id" => Address::first()->id,
            "days" => [
                'sunday', 'monday'
            ],
        ];
    }
}
