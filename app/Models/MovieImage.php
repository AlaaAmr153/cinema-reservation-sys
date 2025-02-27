<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieImage extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function movie(){
        return $this->belongsTo(Movie::class,'movie_id');
    }


     protected $fillable = [
        'movie_id', 'img','path'];
}
