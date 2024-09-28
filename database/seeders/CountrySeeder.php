<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::create([
            'country_name' => 'United States',
        ]);
        Country::create([
            'country_name' => 'United Kingdom',

        ]);
        Country::create([
            'country_name' => 'Australia',
        ]);
        Country::create([
            'country_name' => 'Japan',
        ]);
        Country::create([
            'country_name' => 'South Korea',
        ]);
        Country::create([
            'country_name' => 'France',
        ]);
        Country::create([
            'country_name' => 'Italy',
        ]);
        Country::create([
            'country_name' => 'Spain',
        ]);
        Country::create([
            'country_name' => 'India',
        ]);
        Country::create([
            'country_name' => 'Germany',
        ]);
        Country::create([
            'country_name' => 'Mexico',
        ]);
        Country::create([
            'country_name' => 'Russia',
        ]);
        Country::create([
            'country_name' => 'Brazil',
        ]);
        Country::create([
            'country_name' => 'Sweden',
        ]);
        Country::create([
            'country_name' => 'Turkey',
        ]);

    }
}
