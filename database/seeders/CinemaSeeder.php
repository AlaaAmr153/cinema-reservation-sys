<?php

namespace Database\Seeders;

use App\Models\Cinema;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CinemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cinema::create([
            'cinema_name'=>'Cinema1',
            'cinema_img'=>'images/site_images/cinemas/1.jpg',
            'location'=>'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam
            placeat repellat perspiciatis est debitis expedita voluptas? Ipsam architecto odit autem.',
            'total_screens'=>4,
            'contact_number'=>'512452123'
        ]);
        Cinema::create([
            'cinema_name'=>'Cinema2',
            'cinema_img'=>'images/site_images/cinemas/2.jpg',
            'location'=>'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam placeat
            repellat perspiciatis est debitis expedita voluptas? Ipsam architecto odit autem.',
            'total_screens'=>3,
            'contact_number'=>'512452123'
        ]);
        Cinema::create([
            'cinema_name'=>'Cinema3',
            'cinema_img'=>'images/site_images/cinemas/3.jpg',
            'location'=>'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam placeat
            repellat perspiciatis est debitis expedita voluptas? Ipsam architecto odit autem.',
            'total_screens'=>5,
            'contact_number'=>'512452123'
        ]);
        Cinema::create([
            'cinema_name'=>'Cinema4',
            'cinema_img'=>'images/site_images/cinemas/4.jpg',
            'location'=>'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam placeat
            repellat perspiciatis est debitis expedita voluptas? Ipsam architecto odit autem.',
            'total_screens'=>4,
            'contact_number'=>'512452123'
        ]);
    }
}
