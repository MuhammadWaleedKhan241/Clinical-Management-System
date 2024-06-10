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
        'available_time',
        'appointment_date',
        'appointment_name',
        'description',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'available_time' => 'datetime',
        'appointment_date' => 'datetime',
    ];
}