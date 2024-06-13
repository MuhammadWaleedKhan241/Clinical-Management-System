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
        return view('admin.appointment', compact('appointments'));
    }

    public function create()
    {
        return view('admin.appointment');
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_name' => 'required|string|max:225',
            'doctor' => 'required|string|max:225',
            'description' => 'required|string|max:1000',
            'appointment_date' => 'required|date'
        ]);

        Appointments::create($request->all());
        return redirect()->route('admin.dashboard')->with('success', 'Appointment added successfully.');
    }

    public function edit(Appointments $appointment)
    {
        return view('admin.edit_appointment', compact('appointment'));
    }

    public function update(Request $request, Appointments $appointment)
    {
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'doctor' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'appointment_date' => 'required|date',
        ]);

        $appointment->update($request->all());
        return redirect()->route('admin.appointment.show')->with('success', 'Appointment updated successfully.');
    }

    public function destroy(Appointments $appointment)
    {
        $appointment->delete();
        return redirect()->route('admin.appointment.show')->with('success', 'Appointment deleted successfully.');
    }
}
