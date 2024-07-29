@extends('admin.admin.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <br><br>
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="border-bottom title-part-padding">
                    <h4 class="card-title mb-0">Package Bill List</h4>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <form id="searchForm" action="{{ route('admin.packagebill.show') }}" method="GET" class="d-flex">
                        <input type="text" name="search" id="searchInput" class="form-control"
                            placeholder="Search by doctor or patient name" value="{{ request()->query('search') }}">
                    </form>
                    <button type="button" class="btn btn-info btn-rounded" data-bs-toggle="modal"
                        data-bs-target="#add-opd-bill">Add Package Bill</button>
                </div>

                <!-- Add Package Bill Modal -->
                <div id="add-opd-bill" class="modal fade" tabindex="-1" aria-labelledby="addOPDBillLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="addOPDBillLabel">Add Package Bill</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="opdBillForm" action="{{ route('admin.packagebill.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="package_id" class="form-label">Select Package</label>
                                        <select class="form-control" id="package_id" name="package_id" required>
                                            <option value="" disabled selected>Select a package</option>
                                            @foreach($packages as $package)
                                            <option value="{{ $package->id }}">{{ $package->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="patient_id" class="form-label">Select Patient</label>
                                        <select class="form-control" id="patient_id" name="patient_id" required>
                                            <option value="" disabled selected>Select Patient</option>
                                            @foreach($patients as $patient)
                                            <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="payment_type" class="form-label">Payment Type</label>
                                        <select class="form-control" id="payment_type" name="payment_type" required>
                                            <option value="" disabled selected>Select payment type</option>
                                            <option value="cash">Cash</option>
                                            <option value="credit_card">Credit Card</option>
                                            <option value="debit_card">Debit Card</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="invoice_no" class="form-label">Invoice Number</label>
                                        <input type="text" class="form-control" id="invoice_no" name="invoice_no"
                                            required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="service_amount" class="form-label">Service Amount</label>
                                        <input type="number" step="0.01" class="form-control" id="service_amount"
                                            name="service_amount" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="bill_date" class="form-label">Bill Date</label>
                                        <input type="date" class="form-control" id="bill_date" name="bill_date"
                                            required />
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-info">Save</button>
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Package Bill List -->
            <div class="table-responsive">
                <table id="opdBillTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Package Name</th>
                            <th>Patient Name</th>
                            <th>Total Amount</th>
                            <th>Bill Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($packagebills as $bill)
                        <tr>
                            <td>{{ $bill->id }}</td>
                            <td>{{ $bill->package->name }}</td>
                            <td>{{ $bill->patient->name }}</td>
                            <td>{{ $bill->service_amount }}</td>
                            <td>{{ $bill->bill_date }}</td>
                            <td>
                                <button type="button" class="btn btn-success btn-rounded" data-bs-toggle="modal"
                                    data-bs-target="#edit-opd-bill-{{ $bill->id }}">Edit</button>
                                <form action="{{ route('admin.packagebill.destroy', $bill->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-rounded"
                                        onclick="return confirm('Are you sure you want to delete this bill?')">Delete</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Edit Package Bill Modal -->
                        <div id="edit-opd-bill-{{ $bill->id }}" class="modal fade" tabindex="-1"
                            aria-labelledby="editOPDBillLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="editOPDBillLabel">Edit Package Bill</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.packagebill.update', $bill->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label for="doctor_id_{{ $bill->id }}" class="form-label">Select
                                                    Doctor</label>
                                                <select class="form-control" id="doctor_id_{{ $bill->id }}"
                                                    name="doctor_id" required>
                                                    @foreach($doctors as $doctor)
                                                    <option value="{{ $doctor->id }}" {{ $doctor->id == $bill->doctor_id
                                                        ? 'selected' : '' }}>
                                                        {{ $doctor->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="patient_id_{{ $bill->id }}" class="form-label">Select
                                                    Patient</label>
                                                <select class="form-control" id="patient_id_{{ $bill->id }}"
                                                    name="patient_id" required>
                                                    @foreach($patients as $patient)
                                                    <option value="{{ $patient->id }}" {{ $patient->id ==
                                                        $bill->patient_id ? 'selected' : '' }}>
                                                        {{ $patient->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="package_id_{{ $bill->id }}" class="form-label">Select
                                                    Package</label>
                                                <select class="form-control" id="package_id_{{ $bill->id }}"
                                                    name="package_id" required>
                                                    @foreach($packages as $package)
                                                    <option value="{{ $package->id }}" {{ $package->id ==
                                                        $bill->package_id ? 'selected' : '' }}>
                                                        {{ $package->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="payment_type_{{ $bill->id }}" class="form-label">Payment
                                                    Type</label>
                                                <select class="form-control" id="payment_type_{{ $bill->id }}"
                                                    name="payment_type" required>
                                                    <option value="cash" {{ $bill->payment_type == 'cash' ? 'selected' :
                                                        '' }}>Cash</option>
                                                    <option value="credit_card" {{ $bill->payment_type == 'credit_card'
                                                        ? 'selected' : '' }}>Credit Card</option>
                                                    <option value="debit_card" {{ $bill->payment_type == 'debit_card' ?
                                                        'selected' : '' }}>Debit Card</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="invoice_no_{{ $bill->id }}" class="form-label">Invoice
                                                    Number</label>
                                                <input type="text" class="form-control" id="invoice_no_{{ $bill->id }}"
                                                    name="invoice_no" value="{{ $bill->invoice_no }}" required />
                                            </div>
                                            <div class="mb-3">
                                                <label for="service_amount_{{ $bill->id }}" class="form-label">Service
                                                    Amount</label>
                                                <input type="number" step="0.01" class="form-control"
                                                    id="service_amount_{{ $bill->id }}" name="service_amount"
                                                    value="{{ $bill->service_amount }}" required />
                                            </div>
                                            <div class="mb-3">
                                                <label for="bill_date_{{ $bill->id }}" class="form-label">Bill
                                                    Date</label>
                                                <input type="date" class="form-control" id="bill_date_{{ $bill->id }}"
                                                    name="bill_date" value="{{ $bill->bill_date }}" required />
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-info">Update</button>
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center">
                {{ $packagebills->links() }}
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('searchInput').addEventListener('input', function () {
        clearTimeout(this.searchTimeout);
        this.searchTimeout = setTimeout(() => {
            document.getElementById('searchForm').submit();
        }, 500);
    });
</script>

@endsection