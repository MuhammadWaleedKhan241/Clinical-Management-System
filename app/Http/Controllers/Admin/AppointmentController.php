<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Appointments;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function show()
    {
        $appointments = Appointments::all();
        return view('admin.dashboard', compact('appointments'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'patient_name' => 'required|string|max:225',
            'doctor' => 'required',
            'description' => 'required',
            'appointment_date' => 'required'
        ]);
        Appointments::create($request->all());
        return redirect()->route('admin.appointment')->with('success', 'Appointment added succesfully.');
    }
}