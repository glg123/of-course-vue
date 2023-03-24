<?php

namespace Database\Seeders;

use App\Models\UserForbiddenFood;
use Illuminate\Database\Seeder;

class FoodForbiddenSeeder extends Seeder
{
    public function run(): void
    {
        UserForbiddenFood::factory(4)->create();
    }
}