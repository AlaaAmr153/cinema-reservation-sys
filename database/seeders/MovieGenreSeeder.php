<?php

namespace Database\Seeders;

use App\Models\MovieGenre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MovieGenre::create([
            'genre' => 'Action',
        ]);
        MovieGenre::create([
            'genre' => 'Comedy',
        ]);
        MovieGenre::create([
            'genre' => 'Drama',
        ]);
        MovieGenre::create([
            'genre' => 'Horror',
        ]);
        MovieGenre::create([
            'genre' => 'Science Fiction',
        ]);
        MovieGenre::create([
            'genre' => 'Fantasy',
        ]);
        MovieGenre::create([
            'genre' => 'Romance',
        ]);
        MovieGenre::create([
            'genre' => 'Thriller',
        ]);
        MovieGenre::create([
            'genre' => 'Mystery',
        ]);
        MovieGenre::create([
            'genre' => 'Animation',
        ]);
        MovieGenre::create([
            'genre' => 'Historical',
        ]);
        MovieGenre::create([
            'genre' => 'Adventure',
        ]);
        MovieGenre::create([
            'genre' => 'Superhero',
        ]);
        MovieGenre::create([
            'genre' => 'Crime',
        ]);
        MovieGenre::create([
            'genre' => 'Musical',
        ]);
        MovieGenre::create([
            'genre' => 'War',
        ]);
        MovieGenre::create([
            'genre' => 'Biographical',
        ]);
    }
}
