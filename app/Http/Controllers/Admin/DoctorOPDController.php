<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DoctorOPD;
use App\Models\Doctor;
use App\Models\Department;

class DoctorOPDController extends Controller
{
    public function show()
    {
        $doctorOPDs = DoctorOPD::all();  // Get all DoctorOPDs
        $departments = Department::all(); // Get all Departments
        $doctors = Doctor::all(); // Get all Doctors

        return view('admin.doctor-OPD', compact('doctorOPDs', 'departments', 'doctors'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'phone' => [
                'required',
                'numeric',
                'regex:/^03[0-9]{9}$/',
            ],
            'department' => 'required|string|max:255',
            'doctor_charges' => 'required|numeric',
            'opd_fee' => 'required|numeric',
        ]);

        // Save the validated data to the database
        DoctorOPD::create($validatedData);

        // Redirect with a success message
        return redirect()->route('admin.doctoropd.show')->with('success', 'Doctor OPD added successfully.');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => [
                'required',
                'numeric',
                'regex:/^03[0-9]{9}$/',
            ],
            'department' => 'required|string',
            'doctor_charges' => 'required|numeric',
            'opd_fee' => 'required|numeric',
        ]);

        $doctorOPD = DoctorOPD::findOrFail($id);
        $doctorOPD->update($request->only([
            'name',
            'phone',
            'department',
            'doctor_charges',
            'opd_fee'
        ]));

        return redirect()->route('admin.doctoropd.show')->with('success', 'Doctor OPD updated successfully');
    }


    public function destroy($id)
    {
        $doctor = DoctorOPD::findOrFail($id);
        $doctor->delete();

        return redirect()->route('admin.doctoropd.show')->with('success', 'Doctor OPD deleted successfully.');
    }
}