<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'gender',
        'marital_status',
        'blood_group',
        'dob',
        'age',
        'relative_name',
        'relative_phone',
        'country',
        'state',
        'district',
        'location',
        'occupation',
        'description',
    ];
    public function serviceBills()
    {
        return $this->hasMany(ServiceBill::class);
    }
    public function opdBills()
    { 
        return $this->hasMany(OPD_Bill::class);
    }
    public function bills()
    {
        return $this->hasMany(PatientBill::class);
    }
    public function packageBills()
    {
        return $this->hasMany(PackageBill::class);
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}