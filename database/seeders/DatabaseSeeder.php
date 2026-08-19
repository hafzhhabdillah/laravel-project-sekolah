<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

User::factory()->create([
    'name' => 'Administrator',
    'email' => 'admin@gmail.com',
    'role' => 'admin',
    'password' => bcrypt('password123'),
]);

User::factory()->create([
    'name' => 'Siswa User',
    'email' => 'user@gmail.com',
    'role' => 'user',
    'password' => bcrypt('password123'),
]);

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            SettingSeeder::class,
        ]);
    }
}
