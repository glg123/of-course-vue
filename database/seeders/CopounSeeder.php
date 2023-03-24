<?php

namespace Database\Seeders;

use App\Models\Offer;
use App\Models\Copoun;
use Illuminate\Database\Seeder;

class CopounSeeder extends Seeder
{
    public function run(): void
    {
        Copoun::factory(4)->create();
        Offer::factory(4)->create();
    }
}