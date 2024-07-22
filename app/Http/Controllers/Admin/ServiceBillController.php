<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceBill;
use App\Models\Patient;

class ServiceBillController extends Controller
{
    public function show()
    {
        $servicebills = ServiceBill::with(['service', 'patient'])->get();
        $services = Service::all();
        $patients = Patient::all();

        return view('admin.service-bill', compact('servicebills', 'services', 'patients'));
    }

    public function create()
    {
        $servicebills = ServiceBill::with(['service', 'patient'])->get();
        $services = Service::all();
        $patients = Patient::all();
        return view('admin.service-bill', compact('services', 'patients', 'servicebills'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'service_id' => 'required|exists:services,id',
                'payment_type' => 'required|string',
                'invoice_no' => 'required|string|unique:service_bills,invoice_no',
                'service_amount' => 'required|numeric',
                'patient_id' => 'required|exists:patients,id',
                'bill_date' => 'required|date',
            ]);

            $serviceBill = new ServiceBill();
            $serviceBill->service_id = $request->service_id;
            $serviceBill->payment_type = $request->payment_type;
            $serviceBill->invoice_no = $request->invoice_no;
            $serviceBill->service_amount = $request->service_amount;
            $serviceBill->patient_id = $request->patient_id;
            $serviceBill->bill_date = $request->bill_date;
            $serviceBill->save();

            return response()->json(['success' => true, 'message' => 'Service bill saved successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $servicebill = ServiceBill::findOrFail($id);
        $services = Service::all(); // Fetch all services
        $patients = Patient::all(); // Fetch all patients
        return view('admin.edit_service_bill', compact('servicebill', 'services', 'patients'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'bill_date' => 'required|date',
            'service_id' => 'required|exists:services,id',
            'patient_id' => 'required|exists:patients,id',
            'payment_type' => 'required|string',
            'invoice_no' => 'required|string|max:255',
            'service_amount' => 'required|numeric',
        ]);

        $servicebill = ServiceBill::findOrFail($id);
        $servicebill->update($request->all());

        return redirect()->route('admin.servicebill.show')->with('success', 'Service bill updated successfully.');
    }

    public function destroy($id)
    {
        $servicebill = ServiceBill::findOrFail($id);
        $servicebill->delete();
        return redirect()->route('admin.servicebill.show')->with('success', 'Service bill deleted successfully.');
    }
}
