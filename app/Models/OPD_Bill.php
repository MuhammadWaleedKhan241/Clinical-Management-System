<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opd_Bill extends Model
{
    use HasFactory;
    protected $table = 'opd_bills';

    protected $fillable = [
        'doctor_id',
        'patient_id',
        'invoice_no',
        'service_amount',
        'payment_type',
        'bill_date',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}