<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ScreenHasSeat extends Pivot
{
    protected $table = 'screen_has_seat';

    public function seat()
    {
        return $this->belongsTo(Seat::class, 'seat_id');
    }

    public function screen()
    {
        return $this->belongsTo(Screen::class, 'screen_id');
    }
}
