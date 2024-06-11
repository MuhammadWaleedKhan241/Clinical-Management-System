<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorOPDController extends Controller
{
    public function show()
    {
        return view('admin.doctor-OPD');
    }
    // public function edit()
    // {
    //     return view('admin.doctor-OPD.edit');
    // }
    // public function store()
    // {
    //     return view('admin.doctor-OPD.store');
    // }
    // public function delete()
    // {
    //     return view('admin.doctor-OPD.delete');
    // }
}
