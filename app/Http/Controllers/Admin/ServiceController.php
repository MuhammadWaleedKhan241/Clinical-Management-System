<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function show()
    {
        return view('admin.service');
    }
    public function edit()
    {
        return view('admin.edit-service');
    }
    // public function store()
    // {
    //     return view('admin.service.store');
    // }
    // public function delete()
    // {
    //     return view('admin.service.delete');
    // }
}