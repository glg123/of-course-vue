<?php

namespace Database\Seeders;

use App\Models\ContactMethod;

use Illuminate\Database\Seeder;


class ContactSeeder extends Seeder
{
    public function run(): void
    {
        ContactMethod::factory(4)->create();
    }
}