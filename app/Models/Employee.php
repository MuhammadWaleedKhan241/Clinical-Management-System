<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'phone_no',
        'select_type',
        'select_department',
        'address',
        'education',
        'description',
        'certificate',
        'speciality',
        'working_days',
    ];

    protected $casts = [
        'select_type' => 'array',
        'select_department' => 'array',
        'working_days' => 'array',
    ];
}