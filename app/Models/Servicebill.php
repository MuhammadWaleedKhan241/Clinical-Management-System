<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceBill extends Model
{
    use HasFactory;


    protected $fillable = [
        'service_id',
        'patient_id',
        'invoice_no',
        'service_amount',
        'payment_type',

    ];
    protected $casts = [
        'bill_date' => 'date',
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
