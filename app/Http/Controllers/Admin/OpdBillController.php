<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OPD_Bill;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OPDBillController extends Controller
{
    public function show(Request $request)
    {
        $search = $request->input('search');
        $query = OPD_Bill::query();

        if ($search) {
            $query->whereHas('doctor', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })->orWhereHas('patient', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }

        $opdBills = $query->get();
        $doctors = Doctor::all();
        $patients = Patient::all();

        return view('admin.opd_bill', compact('opdBills', 'doctors', 'patients', 'search'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|integer',
            'patient_id' => 'required|integer',
            'payment_type' => 'required|string',
            'invoice_no' => 'required|string|unique:opd_bills',
            'service_amount' => 'required|numeric',
            'bill_date' => 'required|date',
        ]);

        try {
            $opdBill = new OPD_Bill();
            $opdBill->doctor_id = $request->doctor_id;
            $opdBill->patient_id = $request->patient_id;
            $opdBill->payment_type = $request->payment_type;
            $opdBill->invoice_no = $request->invoice_no;
            $opdBill->service_amount = $request->service_amount;
            $opdBill->bill_date = $request->bill_date;
            $opdBill->save();

            return redirect()->route('admin.OPDbill.show')->with('success', 'OPD Bill Added successfully');
        } catch (\Exception $e) {
            Log::error('Failed to save OPD Bill: ' . $e->getMessage());
        }
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

        return redirect()->route('admin.OPDbill.show')->with('success', 'OPD Bill Updated successfully');
    }

    public function destroy($id)
    {
        try {
            $opdBill = OPD_Bill::findOrFail($id);
            $opdBill->delete();

            return redirect()->route('admin.OPDbill.show')->with('success', 'OPD Bill deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('admin.OPDbill.show')->with('error', 'Failed to delete OPD Bill');
        }
    }
}