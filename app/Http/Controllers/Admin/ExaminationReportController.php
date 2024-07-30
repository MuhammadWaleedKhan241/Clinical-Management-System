<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExaminationReportController extends Controller
{
    public function show()
    {
        return view('admin.examination-test');
    }
}