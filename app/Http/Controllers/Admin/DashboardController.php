<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function show()
    {
        $pendingAppointmentsCount = DB::table('appointments')->where('status', 'pending')->count();
        $totalPatientsCount = DB::table('patients')->count();
        $totalDepartmentsCount = DB::table('departments')->count();
        $totalTestsCount = DB::table('tests')->count();

        // Fetch all appointments for the table
        $appointments = DB::table('appointments')->get();

        return view('admin.dashboard', compact('pendingAppointmentsCount', 'totalPatientsCount', 'totalDepartmentsCount', 'totalTestsCount', 'appointments'));
    }
}
