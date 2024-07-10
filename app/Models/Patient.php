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
}