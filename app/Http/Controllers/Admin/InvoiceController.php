<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function show()
    {
        $invoices = Invoice::all();
        return view('admin.invoice-report', compact('invoices'));
    }

    public function create()
    {
        return view('invoices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            // Validation rules
        ]);

        Invoice::create($request->all());

        return redirect()->route('admin.invoice.show')->with('success', 'Invoice created successfully.');
    }

    // public function show($id)
    // {
    //     $invoice = Invoice::findOrFail($id);
    //     return view('invoices.show', compact('invoice'));
    // }

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
        $invoice->update($request->all());

        return redirect()->route('admin.invoice.show')->with('success', 'Invoice updated successfully.');
    }


    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        return redirect()->route('admin.invoice.show')->with('success', 'Invoice deleted successfully.');
    }
}