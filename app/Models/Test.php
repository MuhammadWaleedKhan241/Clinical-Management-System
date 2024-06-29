<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = ['test_name', 'description'];

    public function packages()
    {
        return $this->belongsToMany(Package::class);
    }
}