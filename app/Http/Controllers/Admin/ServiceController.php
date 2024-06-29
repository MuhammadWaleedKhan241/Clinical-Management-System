<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Department;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function show()
    {
        $services = Service::with('department')->get();
        $departments = Department::all();
        return view('admin.service', compact('services', 'departments'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('admin.service', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('services')->where(function ($query) use ($request) {
                    return $query->where('department_id', $request->department_id);
                })
            ],
            'price' => 'required|numeric',
            'department_id' => 'required|exists:departments,id',
        ], [
            'service_name.unique' => 'Service with this name already exists in the selected department.'
        ]);

        try {
            Service::create([
                'service_name' => $request->service_name,
                'price' => $request->price,
                'department_id' => $request->department_id,
            ]);
            return redirect()->route('admin.service.show')->with('success', 'Service added successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.service.show')->with('error', 'Failed to add service.');
        }
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'department_id' => 'required|exists:departments,id',
        ]);

        try {
            $service->update([
                'service_name' => $request->service_name,
                'price' => $request->price,
                'department_id' => $request->department_id,
            ]);
            return redirect()->route('admin.service.show')->with('success', 'Service updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.service.show')->with('error', 'Failed to update service.');
        }
    }

    public function destroy(Service $service)
    {
        try {
            $service->delete();
            return redirect()->route('admin.service.show')->with('success', 'Service deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.service.show')->with('error', 'Failed to delete service.');
        }
    }
}