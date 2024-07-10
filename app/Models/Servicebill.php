<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceBill extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'amount',
        'bill_date',
        'service_id',
        'patient_id',
        'payment_type',
        'invoice_no',
        'service_amount',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}