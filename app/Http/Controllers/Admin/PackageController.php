<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Test;
use App\Models\Patient;
use App\Models\PatientBill;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    // public function show()
    // {
    //     $patients = Patient::all(); // Assuming you have a Patient model
    //     $packages = Package::all(); // Assuming you have a Package model
    //     $patientBills = patientBill::with(['package', 'patient', 'patientBills'])->get(); // Assuming you have a PatientBill model with relations to package and patient

    //     return view('admin.packages', compact('patients', 'packages', 'patientBills'));
    // }

    public function show()
    {
        $packages = Package::paginate(10);
        return view('admin.packages', compact('packages'));
    }


    public function create()
    {
        $tests = Test::all();
        return view('admin.packages.create', compact('tests'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'package_name' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         //'test_id' => 'required|array',
    //         'price' => 'required|numeric',
    //         'select_test' => 'nullable|string', // Add validation rule if necessary
    //     ]);

    //     $package = Package::create([
    //         'package_name' => $request->package_name,
    //         'description' => $request->description,
    //         'price' => $request->price,
    //         'select_test' => $request->select_test, // Ensure this field is included
    //     ]);

    //     $package->tests()->attach($request->test_id);

    //     return redirect()->route('admin.package.show')->with('success', 'Package created successfully.');
    // }


    public function store(Request $request)
    {
        $request->validate([
            'package_name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        try {
            $package = new Package();
            $package->package_name = $request->package_name;
            $package->description = $request->description;
            $package->price = $request->price;
            $package->save();

            // If you have tests to associate with the package, you can do it here

            return redirect()->route('admin.package.show')->with('success', 'Package added successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.package.show')->with(
                'error',
                'Failed to add package!'
            );
        }
    }



    public function edit($id)
    {
        $package = Package::findOrFail($id);
        $tests = Test::all();
        return view('admin.packages.edit', compact('package', 'tests'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'package_name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        try {
            $package = Package::findOrFail($id);
            $package->package_name = $request->package_name;
            $package->description = $request->description;
            $package->price = $request->price;
            $package->save();

            // If you have tests to update or associate with the package, handle it here

            return redirect()->route('admin.packages.show')->with('success', 'Package updated successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.packages.show')->with('error', 'Failed to update package!');
        }
    }

    public function destroy($id)
    {
        try {
            $package = Package::findOrFail($id);
            $package->delete();

            return redirect()->route('admin.package.show')->with('success', 'Package deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.package.show')->with('error', 'Failed to delete package!');
        }
    }
}