<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screen extends Model
{
    use HasFactory;
    // protected $fillable= ['screen_code','seat_capacity','screen_type','cinema_id','under_maintainance'];
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }
    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }
    public function showtime()
    {
        return $this->hasMany(ShowTime::class);
    }
    public function seats()
    {
        return $this->belongsToMany(Seat::class, 'screen_has_seat', 'screen_id', 'seat_id', 'id', 'id');
    }
}
