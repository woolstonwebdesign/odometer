<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerContact extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'email_address',
        'first_name',
        'surname',
        'is_visible',
    ];
}
