<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(['phone'=>123456789],[
            'first_name'=>'admin',
            'last_name'=>'system',
            'email'=>'admin@gmail.com',
            'password'=> '123456789',

        ])->assignRole('admin');
    }
}
