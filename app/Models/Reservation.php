<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function movie(){
        return $this->belongsTo(Movie::class);
    }

    public function seat(){
        return $this->belongsTo(Seat::class);
    }
    public function screen(){
        return $this->belongsTo(Screen::class);
    }
    public function payment(){
        return $this->hasOne(Payment::class);
    }
    public function showtime(){
        return $this->belongsTo(ShowTime::class, 'show_time_id');
    }
}
