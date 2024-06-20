<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Department;
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
            'service_name' => 'required|string|max:255',
            'service_amount' => 'required|numeric',
            'department_id' => 'required|exists:departments,id',
        ]);

        Service::create([
            'service_name' => $request->service_name,
            'service_amount' => $request->service_amount,
            'department_id' => $request->department_id,
        ]);

        return redirect()->route('services.show')->with('success', 'Service added successfully.');
    }

    public function edit(Service $service)
    {
        $departments = Department::all();
        return view('admin.service-edit', compact('service', 'departments'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'service_amount' => 'required|numeric',
            'department_id' => 'required|exists:departments,id',
        ]);

        $service->update([
            'service_name' => $request->service_name,
            'service_amount' => $request->service_amount,
            'department_id' => $request->department_id,
        ]);

        return redirect()->route('services.show')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.show')->with('success', 'Service deleted successfully.');
    }
}