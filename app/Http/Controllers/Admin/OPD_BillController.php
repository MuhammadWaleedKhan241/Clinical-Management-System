<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OPD_BillController extends Controller
{
    public function show()
    {
        return view('admin.OPD-bill');
    }
}
