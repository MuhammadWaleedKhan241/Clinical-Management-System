@extends('layouts.app')

@section('header')
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Invoice List') }}
        </h2>
    </div>
</header>
@endsection

@section('content')
<div class="container">
    <h1>Invoice List</h1>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createInvoiceModal">Create
        Invoice</button>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th> 
                <th>Customer Name</th>
                <th>Customer Email</th>
                <th>Customer Phone</th>
                <th>Amount</th>
                <th>Invoice Date</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
            <tr>
                <td>{{ $invoice->id }}</td>
                <td>{{ $invoice->customer_name }}</td>
                <td>{{ $invoice->customer_email }}</td>
                <td>{{ $invoice->customer_phone }}</td>
                <td>{{ $invoice->amount }}</td>
                <td>{{ $invoice->invoice_date }}</td>
                <td>{{ $invoice->due_date }}</td>
                <td>{{ $invoice->status }}</td>
                <td>
                    <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                        data-bs-target="#viewInvoiceModal-{{ $invoice->id }}">View</button>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#editInvoiceModal-{{ $invoice->id }}">Edit</button>
                    <form action="{{ route('admin.invoice.destroy', $invoice->id) }}" method="POST"
                        style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>

            <!-- View Modal -->
            <div class="modal fade" id="viewInvoiceModal-{{ $invoice->id }}" tabindex="-1" role="dialog"
                aria-labelledby="viewInvoiceModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewInvoiceModalLabel">Invoice Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $invoice->id }}</td>
                                </tr>
                                <tr>
                                    <th>Customer Name</th>
                                    <td>{{ $invoice->customer_name }}</td>
                                </tr>
                                <tr>
                                    <th>Customer Email</th>
                                    <td>{{ $invoice->customer_email }}</td>
                                </tr>
                                <tr>
                                    <th>Customer Phone</th>
                                    <td>{{ $invoice->customer_phone }}</td>
                                </tr>
                                <tr>
                                    <th>Amount</th>
                                    <td>{{ $invoice->amount }}</td>
                                </tr>
                                <tr>
                                    <th>Invoice Date</th>
                                    <td>{{ $invoice->invoice_date }}</td>
                                </tr>
                                <tr>
                                    <th>Due Date</th>
                                    <td>{{ $invoice->due_date }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ $invoice->status }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End View Modal -->

            <!-- Edit Modal -->
            <div class="modal fade" id="editInvoiceModal-{{ $invoice->id }}" tabindex="-1" role="dialog"
                aria-labelledby="editInvoiceModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editInvoiceModalLabel">Edit Invoice</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.invoice.update', $invoice->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="form-group mb-3">
                                    <label for="customer_name">Customer Name</label>
                                    <input type="text" name="customer_name" class="form-control"
                                        value="{{ $invoice->customer_name }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="customer_email">Customer Email</label>
                                    <input type="email" name="customer_email" class="form-control"
                                        value="{{ $invoice->customer_email }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="customer_phone">Customer Phone</label>
                                    <input type="text" name="customer_phone" class="form-control"
                                        value="{{ $invoice->customer_phone }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="amount">Amount</label>
                                    <input type="text" name="amount" class="form-control" value="{{ $invoice->amount }}"
                                        required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="invoice_date">Invoice Date</label>
                                    <input type="date" name="invoice_date" class="form-control"
                                        value="{{ $invoice->invoice_date }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="due_date">Due Date</label>
                                    <input type="date" name="due_date" class="form-control"
                                        value="{{ $invoice->due_date }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="pending" {{ $invoice->status == 'pending' ? 'selected' : ''
                                            }}>Pending</option>
                                        <option value="paid" {{ $invoice->status == 'paid' ? 'selected' : '' }}>Paid
                                        </option>
                                        <option value="canceled" {{ $invoice->status == 'canceled' ? 'selected' : ''
                                            }}>Canceled</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Update Invoice</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Edit Modal -->
            @endforeach
        </tbody>
    </table>
</div>

<!-- Create Modal -->
<div class="modal fade" id="createInvoiceModal" tabindex="-1" role="dialog" aria-labelledby="createInvoiceModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createInvoiceModalLabel">Create Invoice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.invoice.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="customer_name">Customer Name</label>
                        <input type="text" name="customer_name" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="customer_email">Customer Email</label>
                        <input type="email" name="customer_email" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="customer_phone">Customer Phone</label>
                        <input type="text" name="customer_phone" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="amount">Amount</label>
                        <input type="text" name="amount" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="invoice_date">Invoice Date</label>
                        <input type="date" name="invoice_date" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="due_date">Due Date</label>
                        <input type="date" name="due_date" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="pending">Pending</option>
                            <option value="paid">Paid</option>
                            <option value="canceled">Canceled</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Invoice</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Create Modal -->
@endsection