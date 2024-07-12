<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['department_id', 'service_name', 'price'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function serviceBills()
    {
        return $this->hasMany(ServiceBill::class);
    }
    public function opdBills()
    {
        return $this->hasMany(OPD_Bill::class);
    }
}
