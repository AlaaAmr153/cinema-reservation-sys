<?php

namespace Database\Seeders;

use App\Models\Screen;
use App\Models\ShowTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShowTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ShowTime::create([
            'show_date'=>'2024-07-04',
            'show_time'=>'11:00',
            'available_seats'=>20,
            'screen_id'=>4,
            'movie_id'=>'5',
        ]);

        ShowTime::create([
            'show_date'=>'2024-07-04',
            'show_time'=>'9:00',
            'available_seats'=>20,
            'screen_id'=>4,
            'movie_id'=>'5',
        ]);
    }
}
