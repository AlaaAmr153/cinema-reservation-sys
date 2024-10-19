<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function reservation(){
        return $this->hasMany(reservation::class);
    }
    public function screen(){
        return $this->belongsToMany(Screen::class ,'screen_has_seat','seat_id','screen_id','id','id');
    }

    public function showtime(){
        return $this->belongsTo(ShowTime::class);
    }
}
