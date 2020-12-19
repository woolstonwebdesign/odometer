<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerNote extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'is_billable',
        'description',
        'notes',
        'created_date',
        'time_taken',
    ];

}
