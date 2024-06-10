<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function show()
    {
        return view('admin.package.show');
    }
    public function edit()
    {
        return view('admin.package.edit');
    }
    public function store()
    {
        return view('admin.package.store');
    }
    public function delete()
    {
        return view('admin.package.delete');
    }
}
