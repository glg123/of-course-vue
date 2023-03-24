<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class AdditionalSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

        ];

        foreach ($data as $row) {
            Setting::updateOrCreate(
                ['unique_key' => $row['unique_key']],
                ['key' => $row['key'] ?? null, 'value' => $row['value'] ?? null, 'type' => $row['type'], 'group' => $row['group'] ?? null],
            );
        }
    }
}
