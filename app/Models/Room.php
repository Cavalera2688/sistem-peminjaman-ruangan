<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    // Tambahin baris ini:
    protected $fillable = ['name', 'capacity', 'facilities', 'status'];
}