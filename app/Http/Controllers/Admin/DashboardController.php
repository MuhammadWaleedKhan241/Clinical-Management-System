<?php

namespace App\Http\Controllers\admin;

use App\Models\Appointments;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show()
    {
        $appointments = Appointments::all();
        return view('admin.dashboard', compact('appointments'));
    }
}
