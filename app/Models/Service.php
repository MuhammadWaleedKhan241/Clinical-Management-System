<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['service_id', 'patient_id', 'payment_type', 'invoice_no', 'service_amount', 'bill_date'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function serviceBills()
    {
        return $this->hasMany(ServiceBill::class);
    }
    public function opdBills()
    {
        return $this->hasMany(OPD_Bill::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
