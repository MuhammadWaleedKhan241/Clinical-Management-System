<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function show()
    {
        return view('doctor.dashboard');
    }
}