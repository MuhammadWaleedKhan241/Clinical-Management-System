<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageBill extends Model
{

    protected $table = 'package_test';

    protected $fillable = [
        'patient_id', 'package_id', 'invoice_no', 'service_amount', 'bill_date', 'payment_type'
    ];


    // Define the relationship with Doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    // Define the relationship with Patient
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    // Define the relationship with Package
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}