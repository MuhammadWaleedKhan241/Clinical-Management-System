<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointments;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function show()
    {
        $appointments = Appointments::all();
        $patients = Patient::with('doctor')->get(); // Eager load doctors with patients
        return view('admin.appointment', compact('appointments', 'patients')); // Passed patients variable to view
    }

    public function create()
    {
        return view('admin.appointment');
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor' => 'required|string|max:255',
            'description' => 'required|string',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
        ]);

        $patient = Patient::findOrFail($request->patient_id);

        Appointments::create([
            'patient_name' => $patient->name, // Use patient's name
            'doctor' => $request->doctor,
            'description' => $request->description,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
        ]);

        return redirect()->route('admin.appointment.show')->with('success', 'Appointment added successfully.');
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