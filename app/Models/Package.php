<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_name',
        'description',
        'select_test',
        'price',
    ];


    protected $casts = [
        'select_test' => 'array',
    ];

    public function tests()
    {
        return $this->belongsToMany(Test::class, 'package_test');
    }

    // Test.php
    public function packages()
    {
        return $this->belongsToMany(Package::class);
    }
    public function bills()
    {
        return $this->hasMany(PatientBill::class);
    }
}