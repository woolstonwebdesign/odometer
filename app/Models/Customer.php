<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'suburb',
        'state',
        'postcode',
        'invoicing_text',
        'is_support_customer',
        'is_visible',
        'support_end_date',
        'url',
        'migrate_id'
    ];

    protected $casts = [
        'is_support_customer' => 'boolean',
        'is_visible' => 'boolean',
    ];    
}
