<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function show()
    {
        return view('admin.departments');
    }
    // function store(Request $request)
    // {

    //     $request->validate([

    //         'attribute1' => 'nullable',

    //     ]);


    //     $data = new AddSession();

    //     // $data->year = $request->input('year');

    //     $data->attribute1 = $request->input('attribute1');

    //     $data->save();
    //     return redirect()->route('admin.managesession')->with('success', 'Session Addeed Successfully!');
    // }
    // public function edit()
    // {
    //     return view('admin.departments');
    // }
    // public function store()
    // {
    //     return view('admin.departments.store');
    // }

    // public function delete()
    // {
    //     return view('admin.departments.delete');
    // }
}