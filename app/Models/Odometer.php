<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Odometer extends Model
{
    use HasFactory;
    protected $fillable = [
        'vehicle_id',
        'odometer',
        'user_id',
        'distance_traveled',
        'is_kms',
        'date_of_travel'
    ];

}
