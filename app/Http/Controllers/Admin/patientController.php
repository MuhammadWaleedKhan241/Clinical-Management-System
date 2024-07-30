<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;

class patientController extends Controller
{


    public function show()
    {
        $patients = Patient::paginate(10); // Adjust the number of items per page as needed
        return view('admin.patient', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:patients,email',
            'phone' => 'required|string|max:20',
            'gender' => 'required|in:male,female,other',
            'marital_status' => 'required|in:single,married,divorced,widowed',
            'blood_group' => 'required|string|max:5',
            'dob' => 'required|date',
            'age' => 'required|integer',
            'relative_name' => 'required|string|max:255',
            'relative_phone' => 'required|string|max:20',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'occupation' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Check if a patient with the same email exists
        $patient = Patient::where('email', $request->email)->first();

        if ($patient) {
            // Update the existing patient record
            $patient->update($request->all());
            return redirect()->route('admin.patient.show')->with('success', 'Patient updated successfully.');
        } else {
            // Create a new patient record
            Patient::create($request->all());
            return redirect()->route('admin.patient.show')->with('success', 'Patient added successfully.');
        }
    }


    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('admin.edit_patient', compact('patient'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'gender' => 'required|string',
            'marital_status' => 'required|string',
            'blood_group' => 'required|string',
            'dob' => 'required|date',
            'age' => 'required|integer',
            'relative_name' => 'required|string|max:255',
            'relative_phone' => 'required|string|max:15',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'occupation' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $patient = Patient::findOrFail($id);
        $patient->update($request->all());

        return redirect()->route('admin.patient.show')->with('success', 'Patient updated successfully.');
    }


    public function destroy($id)
    {
        // Find the patient by id and delete
        $patient = Patient::findOrFail($id);
        $patient->delete();

        // Redirect to a relevant page after deletion
        return redirect()->route('admin.patient.show')->with('success', 'Patient deleted successfully');
    }
}