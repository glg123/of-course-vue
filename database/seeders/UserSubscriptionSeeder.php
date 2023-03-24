<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserSubscription;

class UserSubscriptionSeeder extends Seeder
{
    public function run(): void
    {
        UserSubscription::factory(1)->create();
    }
}