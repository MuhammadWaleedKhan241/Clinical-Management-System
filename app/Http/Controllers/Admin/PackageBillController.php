<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PackageBillController extends Controller
{
    public function show()
    {
        return view('admin.package-bill');
    }
}
