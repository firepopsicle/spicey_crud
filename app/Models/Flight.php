<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    // Specify the fillable attributes
    protected $fillable = ['flight_number', 'destination', 'departure_time'];
}
