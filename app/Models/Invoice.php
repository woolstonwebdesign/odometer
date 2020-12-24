<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'date_paid',
        'date_sent',
        'email_subject',
        'invoice_date',
        'invoice_due_date',
        'invoice_scheduled_date',
        'is_canceled',
        'migrate_id'
    ];

    protected $casts = [
        'customer_id' => 'integer',
        'is_canceled' => 'boolean',
        'migrate_id' => 'integer',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }    

}
