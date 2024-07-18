<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientBill extends Model
{
    use HasFactory;

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}