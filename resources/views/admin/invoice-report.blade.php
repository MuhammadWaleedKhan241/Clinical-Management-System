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
<BR></BR>
    <br>
    <br>
    <br>
    <div class="d-flex justify-content-end ">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createInvoiceModal">Add New
            Invoice</button>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div> 
    @endif
    <div>
        <h1>Invoice List</h1>
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
                <td>{{ $invoice->customer_name }}</td>
                <td>{{ $invoice->customer_email }}</td>
                <td>{{ $invoice->customer_phone }}</td>
                <td>{{ $invoice->amount }}</td>
                <td>{{ $invoice->invoice_date }}</td>
                <td>{{ $invoice->due_date }}</td>
                <td>{{ ucfirst($invoice->status) }}</td>
                <td>
                    {{-- <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                        data-bs-target="#viewInvoiceModal-{{ $invoice->id }}">View</button> --}}
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

@endsection



{{-- @extends('admin.admin.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="border-bottom title-part-padding">
                <h4 class="card-title mb-0">Doctor OPD List</h4>
            </div>
            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div>
                    <h4 class="fw-semibold fs-4 text-dark">Doctor OPD List</h4>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-info btn-rounded m-t-10 mb-2" data-bs-toggle="modal"
                        data-bs-target="#add-contact">
                        Add New Doctor OPD
                    </button>
                </div>
                <!-- Add Contact Popup Model -->
                <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header d-flex align-items-center">
                                <h4 class="modal-title" id="myModalLabel">Add Doctor OPD</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal form-material"
                                    action="{{ route('admin.doctoropd.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-md-12 mb-3">
                                            <input type="text" name="full_name" class="form-control"
                                                placeholder="Doctor Name" required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="number" name="phone" class="form-control" placeholder="Phone"
                                                required />
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <input type="text" name="doctor_charges" class="form-control"
                                                placeholder="Doctor Charges" required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="text" name="opd_fee" class="form-control" placeholder="OPD Fee"
                                                required />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-info waves-effect">Save</button>
                                        <button type="button" class="btn btn-danger waves-effect"
                                            data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="demo-foo-addrow"
                        class="table table-striped table-hover table-bordered m-t-3 table-hover contact-list"
                        data-paging="true" data-paging-size="7">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Department</th>
                                <th>OPD Fee</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}