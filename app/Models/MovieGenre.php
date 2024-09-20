<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieGenre extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function movie(){
        return $this->belongsToMany(Movie::class,'movie_genre_has_movie','movie_genre_id','movie_id','id','id');
    }
}
