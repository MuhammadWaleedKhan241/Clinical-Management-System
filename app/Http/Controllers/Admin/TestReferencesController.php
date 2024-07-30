<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestReferencesController extends Controller
{
    public function show()
    {
        return view('admin.test-reference');
    }
}