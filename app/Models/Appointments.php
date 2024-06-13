<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_name',
        'doctor',
        'description',
        'appointment_date',
    ];

    protected $casts = [
        'appointment_date' => 'datetime',
    ];
}
