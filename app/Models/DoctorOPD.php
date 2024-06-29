<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorOPD extends Model
{
    use HasFactory;

    protected $table = 'opd_doctor';

    protected $fillable = [
        'full_name',
        'phone',
        'type',
        'doctor_charges',
        'opd_fee'
    ];

    // public function departments()
    // {
    //     return $this->belongsToMany(Department::class, 'doctor_department', 'doctor_id', 'department_id');
    // }
}