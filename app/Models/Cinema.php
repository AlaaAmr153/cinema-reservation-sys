<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
public function screen(){
    return $this->hasMany(Screen::class);
}
}
