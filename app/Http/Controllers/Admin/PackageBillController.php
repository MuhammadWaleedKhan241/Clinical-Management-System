<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Patient;
use Illuminate\Http\Request;

class PackageBillController extends Controller
{
    public function show()
    {
        $packages = Package::all();
        $patients = Patient::all();
        return view('admin.package-bill', compact('packages', 'patients'));
    }

    public function storePatient(Request $request)
    {
        $request->validate([
            'package_id' => 'required|exists:packages,id',
            'patient_name' => 'required|string|max:255',
        ]);

        Patient::create([
            'name' => $request->patient_name,
        ]);

        return redirect()->back()->with('success', 'Patient added successfully.');
    }
}