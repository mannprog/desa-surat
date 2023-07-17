<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('1234'),
            'is_admin' => 0,
        ]);

        User::factory()->create([
            'name' => 'Warga Cileles',
            'username' => 'warga',
            'email' => 'warga@warga.com',
            'password' => bcrypt('1234'),
            'is_admin' => 1,
        ]);
    }
}
