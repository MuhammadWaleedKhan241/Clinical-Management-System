<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model

{
    use HasFactory;


    public function packages()
    {
        return $this->belongsToMany(Package::class, 'package_test');
    }
}
