<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_id',
        'date_delivered',
        'delivered_to',
        'delivery_comment',
    ];

}
