<?php

namespace Database\Seeders;

use App\Models\Referral;
use App\Models\ReferralUser;
use Illuminate\Database\Seeder;

class ReferralSeeder extends Seeder
{
    public function run(): void
    {
        Referral::factory(2)->create();
        ReferralUser::factory(1)->create();
    }



}