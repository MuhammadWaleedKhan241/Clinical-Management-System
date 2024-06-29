<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function show()
    {
        $employees = Employee::all();
        return view('admin.employee', compact('employees'));
    }

    public function create()
    {
        return view('admin.employee.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric',
            'type' => 'required|string',
            'department' => 'required|string',
            'address' => 'required|string',
            'education' => 'required|string',
            'description' => 'required|string',
            'certificate' => 'required|string',
            'speciality' => 'required|string',
            'working_days' => 'required|string',
        ]);

        Employee::create($request->all());

        return redirect()->route('admin.employee.show')->with('success', 'Employee added successfully.');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('admin.employee.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric',
            'type' => 'required|string',
            'department' => 'required|string',
            'address' => 'required|string',
            'education' => 'required|string',
            'description' => 'required|string',
            'certificate' => 'required|string',
            'speciality' => 'required|string',
            'working_days' => 'required|string',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

        return redirect()->route('admin.employee.show')->with('success', 'Employee updated successfully.');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('admin.employee.show')->with('success', 'Employee deleted successfully.');
    }
}