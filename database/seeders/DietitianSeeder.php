<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DietitianAppointment;


class DietitianSeeder extends Seeder
{
    public function run(): void
    {
        DietitianAppointment::factory(4)->create();
    }
}