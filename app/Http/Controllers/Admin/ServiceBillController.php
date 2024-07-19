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
        $servicebills = ServiceBill::with(['service', 'patient'])->get(); // Fetch all service bills with related service and patient
        $services = Service::all();
        $patients = Patient::all();
        return view('admin.service-bill', compact('servicebills', 'services', 'patients'));
    }

    public function create()
    {
        $services = Service::all(); // Fetch all services to populate the select box
        $patients = Patient::all(); // Fetch all patients to populate the select box
        return view('admin.service-bill', compact('services', 'patients'));
    }

    public function store(Request $request)
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

        // Create a new ServiceBill instance with validated data
        ServiceBill::create([
            'customer_name' => $request->customer_name,
            'amount' => $request->amount,
            'bill_date' => $request->bill_date,
            'service_id' => $request->service_id,
            'patient_id' => $request->patient_id,
            'payment_type' => $request->payment_type,
            'invoice_no' => $request->invoice_no,
            'service_amount' => $request->service_amount,
        ]);

        // Redirect back to the service bill list with a success message
        return redirect()->route('admin.servicebill.show')->with('success', 'Service bill created successfully.');
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