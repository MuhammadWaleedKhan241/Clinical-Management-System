<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceBillController extends Controller
{
    public function show(){
        return view('admin.service-bill');
    }
}