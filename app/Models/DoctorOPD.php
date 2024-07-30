<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorOPD extends Model
{
  use HasFactory;

  protected $table = 'opd_doctor';

  protected $fillable = [
    'name',
    'phone',
    'department',
    'doctor_charges',
    'opd_fee',
  ];
  public function Opd_Bill()
  {
    return $this->hasMany(OPD_Bill::class);
  }
  public function doctor()
  {
    return $this->belongsTo(Doctor::class, 'doctor_id');
  }

  // Relationship with Department Model (if necessary)
  public function department()
  {
    return $this->belongsTo(Department::class, 'department_id');
  }
}