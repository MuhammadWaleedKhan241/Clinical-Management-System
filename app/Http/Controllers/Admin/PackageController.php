<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Test;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function show()
    {
        $packages = Package::with('tests')->get();
        $tests = Test::all();
        return view('admin.packages', compact('packages', 'tests'));
    }

    public function create()
    {
        $tests = Test::all();
        return view('admin.package.create', compact('tests'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'package_name' => 'required|string|max:255',
            'description' => 'required|string',
            //'test_id' => 'required|array',
            'price' => 'required|numeric',
            'select_test' => 'nullable|string', // Add validation rule if necessary
        ]);

        $package = Package::create([
            'package_name' => $request->package_name,
            'description' => $request->description,
            'price' => $request->price,
            'select_test' => $request->select_test, // Ensure this field is included
        ]);

        $package->tests()->attach($request->test_id);

        return redirect()->route('admin.package.show')->with('success', 'Package created successfully.');
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);
        $tests = Test::all();
        return view('admin.edit_package', compact('package', 'tests'));
    }

    public function update(Request $request, Package $package)
    {
        $request->validate([
            'package_name' => 'required|string|max:255',
            'description' => 'required|string',
            'tests' => 'required|array',
            'tests.*' => 'exists:tests,id',
            'price' => 'required|numeric',
        ]);

        $package->update([
            'package_name' => $request->package_name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        $package->tests()->sync($request->tests);

        return redirect()->route('package.show')->with('success', 'Package updated successfully.');
    }

    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->tests()->detach();
        $package->delete();

        return redirect()->route('admin.package.show')->with('success', 'Package deleted successfully.');
    }
}
