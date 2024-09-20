<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movie extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function reservation(){
        return $this->hasMany(Reservation::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function movie_image(){
        return $this->hasMany(MovieImage::class);
    }
    public function show_time(){
        return $this->hasMany(ShowTime::class);
    }
    public function moviegenre(){
        return $this->belongsToMany(MovieGenre::class,'movie_genre_has_movie','movie_id','movie_genre_id','id','id');
    }

}
