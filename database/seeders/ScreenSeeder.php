<?php

namespace Database\Seeders;

use App\Models\Screen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScreenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Screen::create([
            'screen_code'=>'4B',
            'seat_capacity'=>40,
            'screen_type'=>'normal',
            'cinema_id'=>3,
            'under_maintainance'=>false
        ]);
        Screen::create([
            'screen_code'=>'2C',
            'seat_capacity'=>50,
            'screen_type'=>'3D',
            'cinema_id'=>2,
            'under_maintainance'=>false
        ]);
        Screen::create([
            'screen_code'=>'1E',
            'seat_capacity'=>60,
            'screen_type'=>'normal',
            'cinema_id'=>4,
            'under_maintainance'=>false
        ]);
        Screen::create([
            'screen_code'=>'3B',
            'seat_capacity'=>70,
            'screen_type'=>'normal',
            'cinema_id'=>1,
            'under_maintainance'=>false
        ]);
    }
}
