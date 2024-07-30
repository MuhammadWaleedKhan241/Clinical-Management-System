<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function show()
    {
        $employees = Employee::all();
        $departments = Department::all();
        return view('admin.employee', compact('employees', 'departments'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('admin.employee.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => ['required', 'regex:/^(?:\+92|0)?3[0-9]{2}[0-9]{7}$|^(?:\+92|0)?[2-9][0-9]{1,4}[0-9]{7}$/'],
            'type' => 'required|string',
            'department' => 'required|string',
            'address' => 'required|string',
            'education' => 'required|string',
            'description' => 'required|string',
            'certificate' => 'required|string',
            'speciality' => 'required|string',
            'working_days' => 'required|array',
            'working_days.*' => 'in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
        ]);

        $data = $request->all();
        $data['working_days'] = implode(',', $request->working_days);

        Employee::create($data);

        return redirect()->route('admin.employee.show')->with('success', 'Employee added successfully.');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all();
        return view('admin.edit_employee', compact('employee', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => ['required', 'regex:/^(?:\+92|0)?(?:3[0-9]{2}|2[0-9]{1})[0-9]{7}$/'],
            'type' => 'required|string',
            'department' => 'required|string',
            'address' => 'required|string',
            'education' => 'required|string',
            'description' => 'required|string',
            'certificate' => 'required|string',
            'speciality' => 'required|string',
            'working_days' => 'required|array',
            'working_days.*' => 'in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
        ]);

        $employee = Employee::findOrFail($id);
        $data = $request->all();
        $data['working_days'] = implode(',', $request->working_days);

        $employee->update($data);

        return redirect()->route('admin.employee.show')->with('success', 'Employee updated successfully.');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('admin.employee.show')->with('success', 'Employee deleted successfully.');
    }
}