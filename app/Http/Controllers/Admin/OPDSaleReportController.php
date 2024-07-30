<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OPDSaleReportController extends Controller
{
    public function show()
    {
        return view('admin.OPD-sales-report');
    }
}