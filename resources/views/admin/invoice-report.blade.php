@extends('admin.admin.master')

@section('header')
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Invoices') }}
        </h2>
    </div>
</header>
@endsection

@section('content')
<div class="container">
    <div class="border-bottom title-part-padding">
        <h4 class="card-title mb-0">Doctor OPD List</h4>
    </div>
    <br>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="d-flex justify-content-end">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createInvoiceModal">Add New
            Invoice</button>
        <button class="btn btn-primary ml-2" id="generatePdfBtn">Generate PDF</button> <!-- Added PDF Button -->
    </div>
    <div>
        <h4 class="fw-semibold fs-5 text-dark">Invoice List</h4>
    </div>
    <table class="table table-striped table-hover table-bordered m-t-30 table-hover contact-list" data-paging="true"
        data-paging-size="7">
        <thead>
            <tr>
                <th>ID</th>
                <th>Patient Name</th>
                <th>Patient Email</th>
                <th>Patient Phone</th>
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
                <td>{{ $invoice->patient_name }}</td>
                <td>{{ $invoice->patient_email }}</td>
                <td>{{ $invoice->patient_phone }}</td>
                <td>{{ $invoice->amount }}</td>
                <td>{{ $invoice->invoice_date }}</td>
                <td>{{ $invoice->due_date }}</td>
                <td>{{ ucfirst($invoice->status) }}</td>
                <td>
                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                        data-bs-target="#editInvoiceModal-{{ $invoice->id }}">Edit</button>
                    <form action="{{ route('admin.invoice.destroy', $invoice->id) }}" method="POST"
                        style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
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
                                    <label for="patient_name">Patient Name</label>
                                    <input type="text" name="patient_name" class="form-control"
                                        value="{{ $invoice->patient_name }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="patient_email">Patient Email</label>
                                    <input type="email" name="patient_email" class="form-control"
                                        value="{{ $invoice->patient_email }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="patient_phone">Patient Phone</label>
                                    <input type="text" name="patient_phone" class="form-control"
                                        value="{{ $invoice->patient_phone }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="amount">Amount</label>
                                    <input type="number" step="0.01" name="amount" class="form-control"
                                        value="{{ $invoice->amount }}" required>
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
                <form id="createInvoiceForm" action="{{ route('admin.invoice.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="patient_id">Patient Name</label>
                        <select id="patient_id" name="patient_id" class="form-control" required>
                            <option value="">Select Patient</option>
                            @foreach($patients as $patient)
                            <option value="{{ $patient->id }}" data-email="{{ $patient->email }}"
                                data-phone="{{ $patient->phone }}">{{ $patient->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="patient_email">Patient Email</label>
                        <input type="email" id="patient_email" name="patient_email" class="form-control" readonly
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="patient_phone">Patient Phone</label>
                        <input type="text" id="patient_phone" name="patient_phone" class="form-control" readonly
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="amount">Amount</label>
                        <input type="number" step="0.01" name="amount" class="form-control" required>
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

<!-- jQuery Script to Populate Email and Phone -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#patient_id').change(function() {
            var selectedPatient = $(this).find(':selected');
            $('#patient_email').val(selectedPatient.data('email'));
            $('#patient_phone').val(selectedPatient.data('phone'));
        });

        // PDF Generation Script
        // $('#generatePdfBtn').click(function() {
        //     window.location.href = "{{ route('admin.invoice.pdf') }}";
        // });
    });
</script>

@endsection