<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorOPD extends Model
{
  use HasFactory;

  protected $fillable = [
    'full_name',
    'phone',
    'department',
    'doctor_charges',
    'opd_fee',
  ];
}