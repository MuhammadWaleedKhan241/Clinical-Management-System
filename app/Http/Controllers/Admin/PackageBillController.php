<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Package;
use App\Models\PackageBill;

class PackageBillController extends Controller
{
    public function show(Request $request)
    {
        $search = $request->input('search');
        $query = PackageBill::query();

        if ($search) {
            $query->whereHas('patient', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            })->orWhereHas('package', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            });
        }

        $packagebills = $query->paginate(10);
        // dd($packagebills); // This will dump the paginated data

        $patients = Patient::all();
        $packages = Package::all();

        return view('admin.package-bill', compact('packagebills', 'patients', 'packages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'package_id' => 'required|exists:packages,id',
            'payment_type' => 'required|string',
            'invoice_no' => 'required|string',
            'service_amount' => 'required|numeric',
            'bill_date' => 'required|date',
        ]);

        PackageBill::create([
            'patient_id' => $request->patient_id,
            'package_id' => $request->package_id,
            'payment_type' => $request->payment_type,
            'invoice_no' => $request->invoice_no,
            'service_amount' => $request->service_amount,
            'bill_date' => $request->bill_date,
        ]);

        return redirect()->route('admin.packagebill.show')->with('success', 'Package Bill added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'package_id' => 'required|exists:packages,id',
            'payment_type' => 'required|string',
            'invoice_no' => 'required|string',
            'service_amount' => 'required|numeric',
            'bill_date' => 'required|date',
        ]);

        $packageBill = PackageBill::findOrFail($id);
        $packageBill->update([
            'patient_id' => $request->patient_id,
            'package_id' => $request->package_id,
            'payment_type' => $request->payment_type,
            'invoice_no' => $request->invoice_no,
            'service_amount' => $request->service_amount,
            'bill_date' => $request->bill_date,
        ]);

        return redirect()->route('admin.packagebill.show')->with('success', 'Package Bill updated successfully.');
    }



    public function destroy($id)
    {
        $packageBill = PackageBill::findOrFail($id);
        $packageBill->delete();

        return redirect()->route('admin.packagebill.show')->with('success', 'Package Bill deleted successfully.');
    }
}