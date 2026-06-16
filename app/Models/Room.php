<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    // Ini kunci buat buka gembok Mass Assignment-nya Fik!
    protected $fillable = [
        'name', 
        'capacity', 
        'facilities', 
        'status'
    ];
}