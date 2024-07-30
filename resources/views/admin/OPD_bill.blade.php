@extends('admin.admin.master')

@section('content')
<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">
                <br>
                <br>
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                @if (session('error'))  
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif



                <div class="border-bottom title-part-padding">
                    <h4 class="card-title mb-0">OPD Bill List</h4>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    {{-- <form id="searchForm" action="{{ route('admin.OPDbill.show') }}" method="GET" class="d-flex">
                        <input type="text" name="search" id="searchInput" class="form-control"
                            placeholder="Search by doctor or patient name" value="{{ request()->query('search') }}">
                    </form> --}}
                    <button type="button" class="btn btn-sm btn-warning mb-2" data-bs-toggle="modal"
                        data-bs-target="#add-opd-bill">Add OPD Bill</button>
                </div>

                <!-- Add OPD Bill Popup Modal -->
                <div id="add-opd-bill" class="modal fade" tabindex="-1" aria-labelledby="addOPDBillLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="addOPDBillLabel">Add OPD Bill</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="opdBillForm" action="{{ route('admin.OPDbill.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="doctor_id" class="form-label">Select Doctor</label>
                                        <select class="form-control" id="doctor_id" name="doctor_id" required>
                                            <option value="" disabled selected>Select a doctor</option>
                                            @foreach($doctors as $doctor)
                                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
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

                <!-- OPD Bill List -->
                <div class="table-responsive">
                    <table id="opdBillTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Doctor Name</th>
                                <th>Patient Name</th>
                                <th>Amount</th>
                                <th>Bill Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($opdBills as $bill)
                            <tr>
                                <td>{{ $bill->id }}</td>
                                <td>{{ $bill->doctor->name }}</td> <!-- Ensure 'doctor' relationship is defined -->
                                <td>{{ $bill->patient->name }}</td> <!-- Ensure 'patient' relationship is defined -->
                                <td>{{ $bill->service_amount }}</td>
                                <td>{{ $bill->bill_date }}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#edit-opd-bill-{{ $bill->id }}">Edit</button>
                                    <form action="{{ route('admin.OPDbill.destroy', $bill->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this OPD bill?')">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Edit OPD Bill Popup Modal -->
                            <div id="edit-opd-bill-{{ $bill->id }}" class="modal fade" tabindex="-1"
                                aria-labelledby="editOPDBillLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="editOPDBillLabel">Edit OPD Bill</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.OPDbill.update', $bill->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="doctor_id_{{ $bill->id }}" class="form-label">Select
                                                        Doctor</label>
                                                    <select class="form-control" id="doctor_id_{{ $bill->id }}"
                                                        name="doctor_id" required>
                                                        <option value="" disabled>Select a doctor</option>
                                                        @foreach($doctors as $doctor)
                                                        <option value="{{ $doctor->id }}" @if($doctor->id ==
                                                            $bill->doctor_id) selected @endif>{{ $doctor->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="patient_id_{{ $bill->id }}" class="form-label">Select
                                                        Patient</label>
                                                    <select class="form-control" id="patient_id_{{ $bill->id }}"
                                                        name="patient_id" required>
                                                        <option value="" disabled>Select Patient</option>
                                                        @foreach($patients as $patient)
                                                        <option value="{{ $patient->id }}" @if($patient->id ==
                                                            $bill->patient_id) selected @endif>{{ $patient->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="payment_type_{{ $bill->id }}" class="form-label">Payment
                                                        Type</label>
                                                    <select class="form-control" id="payment_type_{{ $bill->id }}"
                                                        name="payment_type" required>
                                                        <option value="" disabled>Select payment type</option>
                                                        <option value="cash" @if($bill->payment_type == 'cash') selected
                                                            @endif>Cash</option>
                                                        <option value="credit_card" @if($bill->payment_type ==
                                                            'credit_card') selected @endif>Credit Card</option>
                                                        <option value="debit_card" @if($bill->payment_type ==
                                                            'debit_card') selected @endif>Debit Card</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="invoice_no_{{ $bill->id }}" class="form-label">Invoice
                                                        Number</label>
                                                    <input type="text" class="form-control"
                                                        id="invoice_no_{{ $bill->id }}" name="invoice_no"
                                                        value="{{ $bill->invoice_no }}" required />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="service_amount_{{ $bill->id }}"
                                                        class="form-label">Service Amount</label>
                                                    <input type="number" step="0.01" class="form-control"
                                                        id="service_amount_{{ $bill->id }}" name="service_amount"
                                                        value="{{ $bill->service_amount }}" required />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="bill_date_{{ $bill->id }}" class="form-label">Bill
                                                        Date</label>
                                                    <input type="date" class="form-control"
                                                        id="bill_date_{{ $bill->id }}" name="bill_date"
                                                        value="{{ $bill->bill_date }}" required />
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
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('searchInput').addEventListener('input', function() {
        document.getElementById('searchForm').submit();
    });
</script>
@endpush