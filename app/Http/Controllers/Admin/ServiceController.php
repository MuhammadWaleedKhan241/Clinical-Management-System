<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Department;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function show(Request $request)
    {
        $query = Service::with('department');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('service_name', 'like', "%{$search}%")
                ->orWhereHas('department', function ($q) use ($search) {
                    $q->where('department_name', 'like', "%{$search}%");
                });
        }

        $services = $query->paginate(10);
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
        try {
            $request->validate([
                'service_name' => 'required|string|max:255',
                'price' => 'required|numeric',
                'department_id' => 'required|exists:departments,id',
            ]);

            $service = new Service();
            $service->service_name = $request->service_name;
            $service->price = $request->price;
            $service->department_id = $request->department_id;
            $service->save();

            return redirect()->route('admin.service.show')->with('success', 'Service added successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.service.show')->with('error', 'Failed to add service: ' . $e->getMessage());
        }
    }
    public function edit(Service $service)
    {
        $departments = Department::all();
        return view('admin.edit_service', compact('service', 'departments'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'service_name' => 'required|string|max:255|unique:services,service_name,' . $service->id,
            'price' => 'required|numeric',
            'department_id' => 'required|exists:departments,id',
        ]);


        $service->update([
            'service_name' => $request->service_name,
            'price' => $request->price,
            'department_id' => $request->department_id,
        ]);

        return redirect()->route('admin.service.show')->with('success', 'Service updated successfully.');
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