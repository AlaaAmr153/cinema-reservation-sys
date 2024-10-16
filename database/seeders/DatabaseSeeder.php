<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\MovieImage;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
           CountrySeeder::class,
           MovieGenreSeeder::class,
           MovieSeeder::class,
           CinemaSeeder::class,
           ScreenSeeder::class,
           ShowTimeSeeder::class,
           RoleSeeder::class,
           AdminSeeder::class,
           SeatSeeder::class,
           ScreenHasSeatSeeder::class
        //    MovieImage::class
        ]);
    }
}
