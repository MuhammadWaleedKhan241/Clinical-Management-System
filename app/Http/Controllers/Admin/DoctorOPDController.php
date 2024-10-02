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
        $doctorOPDs = DoctorOPD::all();
        $departments = Department::all();
        $doctors = Doctor::all();

        return view('admin.doctor-OPD', compact('doctorOPDs', 'departments', 'doctors'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|exists:doctors,id',
                'phone' => 'required|numeric|regex:/^03[0-9]{9}$/',
                'department' => 'required|string|max:255',
                'doctor_charges' => 'required|numeric',
                'opd_fee' => 'required|numeric',
            ]);

            // Debugging: Check the validated data
             dd($validatedData);

            // Create the DoctorOPD record
            DoctorOPD::create($validatedData);

            return redirect()->route('admin.doctoropd.show')->with('success', 'Doctor OPD added successfully.');
        } catch (\Exception $e) {
            // Log the error and return a failure message

            return redirect()->route('admin.doctoropd.show')->with('error', 'Failed to add Doctor OPD. Please try again.');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|regex:/^03[0-9]{9}$/',
            'department' => 'required|string|max:255',
            'doctor_charges' => 'required|numeric',
            'opd_fee' => 'required|numeric',
        ]);

        $doctor = DoctorOPD::findOrFail($id);
        $doctor->update($validatedData);

        return redirect()->route('admin.doctoropd.show')->with('success', 'Doctor OPD updated successfully.');
    }

    public function destroy($id)
    {
        $doctor = DoctorOPD::findOrFail($id);
        $doctor->delete();

        return redirect()->route('admin.doctoropd.show')->with('success', 'Doctor OPD deleted successfully.');
    }
}