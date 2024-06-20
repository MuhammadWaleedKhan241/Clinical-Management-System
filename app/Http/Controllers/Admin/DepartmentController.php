<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function show()
    {
        $departments = Department::all(); // Using plural for the variable name
        return view('admin.departments', compact('departments')); // Passing the variable to the view
    }

    public function create()
    {
        return view('admin.departments');
    }

    public function store(Request $request)
    {
        $request->validate([
            'department_name' => 'required|string|max:255',
        ]);

        Department::create(['department_name' => $request->department_name]);
        return redirect()->route('admin.department.store')->with('success', 'Department added successfully.');
    }

    public function edit(Department $department)
    {
        return view('admin.edit_department', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'department_name' => 'required|string|max:255',
        ]);

        $department->update(['department_name' => $request->department_name]);
        return redirect()->route('admin.department.show')->with('success', 'Department updated successfully.');
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('admin.department.show')->with('success', 'Department deleted successfully.');
    }
}