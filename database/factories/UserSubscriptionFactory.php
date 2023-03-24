<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Offer;
use App\Models\Copoun;
use App\Models\Package;
use App\Models\Referral;
use App\Models\ReferralUser;
use App\Models\PackageVarient;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserSubscriptionFactory extends Factory
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
            "package_id" => Package::first()->id,
            "package_varient_id" => PackageVarient::first()->id,
            "copoun_id" => Copoun::first()->id,
            "offer_id" => Offer::first()->id,
            "referral_code" => ReferralUser::first()->code,
            "price" => 20,
            "discount" => 5,
            "qty" => 1,
            "total" => 15,
            "active" =>true,
            "start_at" => now(),
            "end_at" => now()->addMonth(),
            "type" =>'offline'
        ];
    }


}
