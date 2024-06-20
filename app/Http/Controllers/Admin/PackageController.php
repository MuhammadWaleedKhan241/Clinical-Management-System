<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function show()
    {
        $packages = Package::with('tests')->get();
        return view('admin.packages', compact('packages'));
    }

    public function create()
    {
        return view('admin.package-create'); // Changed view name for clarity
    }

    public function store(Request $request)
    {
        $request->validate([
            'package_name' => 'required|string|max:255',
            'description' => 'required|string',
            'tests' => 'required|array',
            'price' => 'required|numeric',
        ]);

        $package = Package::create([
            'package_name' => $request->package_name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        $package->tests()->attach($request->tests);

        return redirect()->route('package.show')->with('success', 'Package added successfully.');
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('admin.package-edit', compact('package')); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'package_name' => 'required|string|max:255',
            'description' => 'required|string',
            'tests' => 'required|array',
            'price' => 'required|numeric',
        ]);

        $package = Package::findOrFail($id);
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

        return redirect()->route('package.show')->with('success', 'Package deleted successfully.');
    }
}