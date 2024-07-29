<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Test;
use Illuminate\Http\Request;

class PackageController extends Controller
{
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

    public function store(Request $request)
    {
        $request->validate([
            'package_name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'select_test' => 'nullable|array',
        ]);

        try {
            $package = new Package();
            $package->package_name = $request->package_name;
            $package->description = $request->description;
            $package->price = $request->price;
            $package->select_test = $request->select_test;
            $package->save();

            return redirect()->route('packages.show')->with('success', 'Package added successfully!');
        } catch (\Exception $e) {
            return redirect()->route('packages.show')->with('error', 'Failed to add package!');
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
            'select_test' => 'nullable|array',
        ]);

        try {
            $package = Package::findOrFail($id);
            $package->package_name = $request->package_name;
            $package->description = $request->description;
            $package->price = $request->price;
            $package->select_test = $request->select_test;
            $package->save();

            return redirect()->route('packages.show')->with('success', 'Package updated successfully!');
        } catch (\Exception $e) {
            return redirect()->route('packages.show')->with('error', 'Failed to update package!');
        }
    }

    public function destroy($id)
    {
        try {
            $package = Package::findOrFail($id);
            $package->delete();

            return redirect()->route('packages.show')->with('success', 'Package deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('packages.show')->with('error', 'Failed to delete package!');
        }
    }
}