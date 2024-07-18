<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Opd_Bill;
use App\Models\Service;
use App\Models\Patient;

class OpdBillController extends Controller
{
    public function show()
    {
        $opdBills = Opd_Bill::all();
        $services = Service::all();
        $patients = Patient::all();
        return view('admin.opd_bill', compact('opdBills', 'services', 'patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'bill_date' => 'required|date',
            'service_id' => 'required|exists:services,id',
            'patient_id' => 'required|exists:patients,id',
            'payment_type' => 'required|string',
            'invoice_no' => 'required|string|max:255',
            'service_amount' => 'required|numeric',
        ]);



        Opd_Bill::create($request->all());

        return response()->json(['success' => 'OPD Bill created successfully.']);
    }

    public function update(Request $request, Opd_Bill $opdBill)
    {
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'bill_date' => 'required|date',
            'service_id' => 'required|exists:services,id',
            'patient_id' => 'required|exists:patients,id',
            'payment_type' => 'required|string',
            'invoice_no' => 'required|string|max:255',
            'service_amount' => 'required|numeric',
        ]);

        $opdBill->update($request->all());

        return redirect()->back()->with('success', 'OPD Bill updated successfully.');
    }

    public function destroy(Opd_Bill $opdBill)
    {
        $opdBill->delete();

        return redirect()->back()->with('success', 'OPD Bill deleted successfully.');
    }
}