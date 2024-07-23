<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OPD_Bill;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class OPDBillController extends Controller
{
    public function show()
    {
        $opdBills = OPD_Bill::with('doctor', 'patient')->get(); // Fetch related data if needed
        $doctors = Doctor::all();
        $patients = Patient::all();

        return view('admin.opd_bill', compact('opdBills', 'doctors', 'patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'payment_type' => 'required',
            'invoice_no' => 'required|unique:opd_bills',
            'service_amount' => 'required|numeric',
        ]);

        OPD_Bill::create($request->all());

        return response()->json(['success' => 'OPD Bill added successfully']);
    }

    public function update(Request $request, OPD_Bill $opdBill)
    {
        $validatedData = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'invoice_no' => 'required|string|max:255',
            'service_amount' => 'required|numeric',
            'payment_type' => 'required|in:cash,credit_card,debit_card',
            'bill_date' => 'required|date',
        ]);

        $opdBill->update($validatedData);

        return response()->json(['message' => 'OPD Bill updated successfully!']);
    }

    public function destroy(OPD_Bill $opdBill)
    {
        $opdBill->delete();

        return response()->json(['message' => 'OPD Bill deleted successfully!']);
    }
}
