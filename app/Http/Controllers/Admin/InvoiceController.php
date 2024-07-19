<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\Department;
use App\Models\Doctor;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function show()
    {
        $invoices = Invoice::all();
        $patients = Patient::select('id', 'name', 'email', 'phone')->get(); // Fetch patients with specific fields
        return view('admin.invoice-report', compact('invoices', 'patients'));
    }


    public function create()
    {
        $patients = Patient::select('id', 'name', 'email', 'phone')->get();
        return view('admin.invoice-report', compact('patients'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'patient_email' => 'required|email',
            'patient_phone' => 'required|string',
            'amount' => 'required|numeric',
            'invoice_date' => 'required|date',
            'due_date' => 'required|date',
            'status' => 'required|string|in:pending,paid,canceled',
        ]);

        $patient = Patient::find($request->patient_id);

        $invoice = new Invoice();
        $invoice->patient_name = $patient->name;
        $invoice->patient_email = $request->patient_email;
        $invoice->patient_phone = $request->patient_phone;
        $invoice->amount = $request->amount;
        $invoice->invoice_date = $request->invoice_date;
        $invoice->due_date = $request->due_date;
        $invoice->status = $request->status;
        $invoice->save();

        return redirect()->route('admin.invoice.show')->with('success', 'Invoice created successfully.');
    }

    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('invoices.edit', compact('invoice'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'invoice_date' => 'required|date',
            'due_date' => 'required|date',
            'status' => 'required|string|in:pending,paid,canceled',
        ]);

        $invoice = Invoice::findOrFail($id);
        $invoice->update([
            'customer_name' => $request->input('customer_name'),
            'customer_email' => $request->input('customer_email'),
            'customer_phone' => $request->input('customer_phone'),
            'amount' => $request->input('amount'),
            'invoice_date' => $request->input('invoice_date'),
            'due_date' => $request->input('due_date'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('admin.invoice.show')->with('success', 'Invoice updated successfully.');
    }

    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        return redirect()->route('admin.invoice.show')->with('success', 'Invoice deleted successfully.');
    }
    // public function generatePDF()
    // {
    //     $invoices = Invoice::all();

    //     // Generate PDF using barryvdh/laravel-dompdf
    //     $pdf = PDF::loadView('admin.invoice-pdf', compact('invoices'));

    // //Optionally, you can download the PDF instead of displaying it
    // return $pdf->download('invoice.pdf');

    // //Display the PDF in the browser
    //     return $pdf->stream('invoice.pdf');
    // }
    
}