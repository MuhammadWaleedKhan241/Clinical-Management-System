@extends('admin.admin.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            
            <div class="card-body">
                <br>
                <br>
                <div class="border-bottom title-part-padding">
                    <h4 class="card-title mb-0">OPD Bill List</h4>
                </div>
                <div class="d-flex justify-content-end mb-2">
                    <button type="button" class="btn btn-info btn-rounded" data-bs-toggle="modal"
                        data-bs-target="#add-opd-bill">
                        Add OPD Bill
                    </button>
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
                                    <div id="conditionalFields" style="display: none;">
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
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info">Save</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

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
                            <td>{{ $bill->name }}</td>
                            <td>{{ $bill->patient->name }}</td>
                            <td>{{ $bill->amount }}</td>
                            <td>{{ $bill->bill_date }}</td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#edit-opd-bill-{{ $bill->id }}">Edit</button>
                                <form action="{{ route('OPDbill.destroy', $bill->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this OPD bill?')">Delete</button>
                                </form>
                                <!-- Edit Modal -->
                                <div id="edit-opd-bill-{{ $bill->id }}" class="modal fade" tabindex="-1"
                                    aria-labelledby="editOPDBillLabel-{{ $bill->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="editOPDBillLabel-{{ $bill->id }}">Edit OPD
                                                    Bill</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('OPDbill.update', $bill->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="edit_doctor_id" class="form-label">Select
                                                            Doctor</label>
                                                        <select class="form-control" id="edit_doctor_id"
                                                            name="doctor_id" required>
                                                            @foreach($doctors as $doctor)
                                                            <option value="{{ $doctor->id }}" {{ $bill->doctor_id ==
                                                                $doctor->id ? 'selected' : '' }}>{{ $doctor->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_patient_id" class="form-label">Select
                                                            Patient</label>
                                                        <select class="form-control" id="edit_patient_id"
                                                            name="patient_id" required>
                                                            @foreach($patients as $patient)
                                                            <option value="{{ $patient->id }}" {{ $bill->patient_id ==
                                                                $patient->id ? 'selected' : '' }}>{{ $patient->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_payment_type" class="form-label">Payment
                                                            Type</label>
                                                        <select class="form-control" id="edit_payment_type"
                                                            name="payment_type" required>
                                                            <option value="cash" {{ $bill->payment_type == 'cash' ?
                                                                'selected' : '' }}>Cash</option>
                                                            <option value="credit_card" {{ $bill->payment_type ==
                                                                'credit_card' ? 'selected' : '' }}>Credit Card</option>
                                                            <option value="debit_card" {{ $bill->payment_type ==
                                                                'debit_card' ? 'selected' : '' }}>Debit Card</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_invoice_no" class="form-label">Invoice
                                                            Number</label>
                                                        <input type="text" class="form-control" id="edit_invoice_no"
                                                            name="invoice_no" value="{{ $bill->invoice_no }}"
                                                            required />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_service_amount" class="form-label">Service
                                                            Amount</label>
                                                        <input type="number" step="0.01" class="form-control"
                                                            id="edit_service_amount" name="service_amount"
                                                            value="{{ $bill->service_amount }}" required />
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
                                <!-- End Edit Modal -->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Initialize DataTable
        $('#opdBillTable').DataTable(); 

        // Show conditional fields when a doctor is selected
        $('#doctor_id').change(function() {
            const doctorId = $(this).val();
            $('#conditionalFields').toggle(!!doctorId);
        });

        // Submit form using AJAX
        $('#opdBillForm').submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    alert('OPD Bill added successfully!');
                    location.reload();
                },
                error: function(error) {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again.');
                }
            });
        });
    });
</script>
@endsection