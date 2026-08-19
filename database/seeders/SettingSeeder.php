<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        Setting::updateOrCreate(
            ['id' => 1],
            [
                'school_name'  => 'SMK Negeri 1 Jakarta Selatan',
                'phone_number' => '081234567890',
                'address'      => 'Jl. Pendidikan No. 10, Jakarta Selatan',
            ]
        );
    }
}
