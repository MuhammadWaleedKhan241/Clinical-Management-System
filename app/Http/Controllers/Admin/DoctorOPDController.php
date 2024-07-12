<?php
// app/Http/Controllers/Admin/DoctorOPDController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DoctorOPD;
use App\Models\Department;

class DoctorOPDController extends Controller
{


    public function show()
    {
        $doctors = DoctorOPD::all();
        $departments = Department::all();
        return view('admin.doctor-OPD', compact('doctors', 'departments'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('admin.doctor-OPD.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'department' => 'required|string',
            'doctor_charges' => 'required|numeric',
            'opd_fee' => 'required|numeric',
        ]);

        DoctorOPD::create([
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'department' => $request->department,
            'doctor_charges' => $request->doctor_charges,
            'opd_fee' => $request->opd_fee,
        ]);

        return redirect()->route('admin.doctoropd.show')->with('success', 'Doctor OPD added successfully');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'department' => 'required|string',
            'doctor_charges' => 'required|numeric',
            'opd_fee' => 'required|numeric',
        ]);

        $doctorOPD = DoctorOPD::findOrFail($id);
        $doctorOPD->update([
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'department' => $request->department,
            'doctor_charges' => $request->doctor_charges,
            'opd_fee' => $request->opd_fee,
        ]);

        return redirect()->route('admin.doctoropd.')->with('success', 'Doctor OPD updated successfully');
    }


    public function edit($id)
    {
        $doctor = DoctorOPD::findOrFail($id);
        $departments = Department::all();
        return view('admin.doctor-OPD.edit', compact('doctor', 'departments'));
    }



    public function destroy($id)
    {
        $doctor = DoctorOPD::findOrFail($id);
        $doctor->delete();

        return redirect()->route('admin.doctoropd.')->with('success', 'Doctor OPD deleted successfully.');
    }
}