<?php

namespace Database\Seeders;

use App\Models\Screen;
use App\Models\Seat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScreenHasSeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $screen = Screen::where('screen_code', '3B')->first();
        $seatIds = Seat::pluck('id')->toArray();
        $screen->seats()->attach($seatIds);
    }
}
