<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function show()
    {
        return view('admin.invoice');
    }
    // public function edit()
    // {
    //     return view('admin.employee.edit');
    // }
    // public function store()
    // {
    //     return view('admin.employee.store');
    // }
    // public function delete()
    // {
    //     return view('admin.employee.delete');
    // }
}