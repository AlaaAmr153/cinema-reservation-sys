<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShowTime extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
public function movie(){
    return $this->belongsTo(Movie::class);
}
public function screen(){
    return $this->belongsTo(Screen::class);
}
public function reservation(){
    return $this->hasMany(Reservation::class);
}

public function seats(){
    return $this->hasMany(Seat::class);
}
}
