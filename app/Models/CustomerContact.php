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
        'migrate_id'
    ];

    protected $casts = [
        'is_visible' => 'boolean',
        'migrate_id' => 'integer',
        'customer_id' => 'integer'
    ];    

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }    
}
