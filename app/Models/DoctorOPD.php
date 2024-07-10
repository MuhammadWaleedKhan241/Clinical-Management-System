<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorOPD extends Model
{
    use HasFactory;

      protected $table = 'opd_doctor';  //Specify the table name if it doesn't follow the convention

    protected $fillable = [
        'full_name',
        'phone',
        'department',
        'doctor_charges',
        'opd_fee',
    ];
}