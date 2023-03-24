<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class FakeSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'email'=>'customer@fa.com',
            'phone'=>'0100000000'
        ])->assignRole('customer');

        \App\Models\Unit::factory(2)->create();
        \App\Models\Brand::factory(2)->create();
        \App\Models\Food::factory(2)->create();
        \App\Models\MealCategory::factory(2)->create();
        \App\Models\MealPlan::factory(2)->create();
        \App\Models\Tag::factory(2)->create();
        \App\Models\Meal::factory(2)->create();

          $this->call([
            MealSeeder::class,
            InvoiceSeeder::class,
            PackageSeeder::class,
            LocationSeeder::class,
            FaqSeeder::class,
            ReferralSeeder::class,
            ContactSeeder::class,
            CopounSeeder::class,
            ClinicSeeder::class,
            DietitianSeeder::class,
            FoodForbiddenSeeder::class,
            UserSubscriptionSeeder::class,
            OrderSeeder::class,
            ReviewSeeder::class,
        ]);
    }
}
