<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            User::create([
                'name' => 'admin',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => '123456789',
            ])->assignRole('admin');

            User::create([
                'name' => 'super_admin',
                'email' => 'superadmin@example.com',
                'email_verified_at' => now(),
                'password' => '123456789',
            ])->assignRole('super_admin');
    }
}
