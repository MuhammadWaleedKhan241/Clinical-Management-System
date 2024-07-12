@extends('admin.admin.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="border-bottom title-part-padding">
                <h4 class="card-title mb-0">OPD Bill List</h4>
            </div>
            <div class="card-body">

                <div>
                    <h4 class="fw-semibold fs-4 text-dark">OPD Bill List</h4>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-info btn-rounded m-t-10 mb-2" data-bs-toggle="modal"
                        data-bs-target="#add-opd-bill">
                        Add OPD Bill
                    </button>
                </div>
                <!-- Add OPD Bill Popup Modal -->
                <div id="add-opd-bill" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header d-flex align-items-center">
                                <h4 class="modal-title" id="myModalLabel">
                                    Add OPD Bill
                                </h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal form-material" id="opdBillForm"
                                    action="{{ route('admin.opdBill.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-md-12 mb-3">
                                            <input type="text" class="form-control" name="patient_name"
                                                placeholder="Patient Name" required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="number" step="0.01" class="form-control" name="amount"
                                                placeholder="Amount" required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="date" class="form-control" name="bill_date"
                                                placeholder="Bill Date" required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="service_id" class="form-label">Select Service</label>
                                            <select class="form-control" id="service_id" name="service_id" required>
                                                <option value="" disabled selected>Select a service</option>
                                                @foreach($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="payment_type" class="form-label">Payment Type</label>
                                            <select class="form-control" id="payment_type" name="payment_type" required>
                                                <option value="" disabled selected>Select payment type</option>
                                                <option value="cash">Cash</option>
                                                <option value="credit_card">Credit Card</option>
                                                <option value="debit_card">Debit Card</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="invoice_no" class="form-label">Invoice Number</label>
                                            <input type="text" class="form-control" id="invoice_no" name="invoice_no"
                                                placeholder="Enter invoice number" required>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="service_amount" class="form-label">Service Amount</label>
                                            <input type="number" step="0.01" class="form-control" id="service_amount"
                                                name="service_amount" placeholder="Enter service amount" required>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="patient_id" class="form-label">Select Patient</label>
                                            <select class="form-control" name="patient_id" required>
                                                <option value="" disabled selected>Select Patient</option>
                                                @foreach($patients as $patient)
                                                <option value="{{ $patient->id }}">{{ $patient->patient_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-info waves-effect">
                                            Save
                                        </button>
                                        <button type="button" class="btn btn-danger waves-effect"
                                            data-bs-dismiss="modal">
                                            Cancel
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <div class="table-responsive">
                    <table id="demo-foo-addrow" class="table table-bordered m-t-3 table-hover contact-list"
                        data-paging="true" data-paging-size="7">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Patient Name</th>
                                <th>Amount</th>
                                <th>Bill Date</th>
                                <th>Service</th>
                                <th>Patient</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($opdBills as $bill)
                            <tr>
                                <td>{{ $bill->id }}</td>
                                <td>{{ $bill->patient_name }}</td>
                                <td>{{ $bill->amount }}</td>
                                <td>{{ $bill->bill_date }}</td>
                                <td>{{ $bill->service->name }}</td>
                                <td>{{ $bill->patient->patient_name }}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#edit-opd-bill-{{ $bill->id }}">Edit</button>
                                    <form action="{{ route('admin.opdBill.destroy', $bill->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this OPD bill?')">Delete</button>
                                    </form>
                                    <!-- Edit Modal -->
                                    <div id="edit-opd-bill-{{ $bill->id }}" class="modal fade" tabindex="-1"
                                        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header d-flex align-items-center">
                                                    <h4 class="modal-title" id="myModalLabel">Edit OPD Bill</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal form-material"
                                                        action="{{ route('admin.opdBill.update', $bill->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="form-group">
                                                            <div class="col-md-12 mb-3">
                                                                <input type="text" name="patient_name"
                                                                    class="form-control"
                                                                    value="{{ $bill->patient_name }}" required />
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <input type="number" step="0.01" name="amount"
                                                                    class="form-control" value="{{ $bill->amount }}"
                                                                    required />
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <input type="date" name="bill_date" class="form-control"
                                                                    value="{{ $bill->bill_date }}" required />
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <label for="service_id" class="form-label">Select
                                                                    Service</label>
                                                                <select name="service_id" class="form-control" required>
                                                                    @foreach($services as $service)
                                                                    <option value="{{ $service->id }}" {{ $bill->
                                                                        service_id == $service->id ? 'selected' : '' }}>
                                                                        {{ $service->name }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <label for="payment_type" class="form-label">Payment
                                                                    Type</label>
                                                                <select name="payment_type" class="form-control"
                                                                    required>
                                                                    <option value="cash" {{ $bill->payment_type ==
                                                                        'cash' ? 'selected' : '' }}>Cash</option>
                                                                    <option value="credit_card" {{ $bill->payment_type
                                                                        == 'credit_card' ? 'selected' : '' }}>Credit
                                                                        Card</option>
                                                                    <option value="debit_card" {{ $bill->payment_type ==
                                                                        'debit_card' ? 'selected' : '' }}>Debit Card
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <label for="invoice_no" class="form-label">Invoice
                                                                    Number</label>
                                                                <input type="text" name="invoice_no"
                                                                    class="form-control" value="{{ $bill->invoice_no }}"
                                                                    required>
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <label for="service_amount" class="form-label">Service
                                                                    Amount</label>
                                                                <input type="number" step="0.01" name="service_amount"
                                                                    class="form-control"
                                                                    value="{{ $bill->service_amount }}" required>
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <label for="patient_id" class="form-label">Select
                                                                    Patient</label>
                                                                <select name="patient_id" class="form-control" required>
                                                                    @foreach($patients as $patient)
                                                                    <option value="{{ $patient->id }}" {{ $bill->
                                                                        patient_id == $patient->id ? 'selected' : '' }}>
                                                                        {{ $patient->patient_name }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-info waves-effect">
                                                                Save
                                                            </button>
                                                            <button type="button" class="btn btn-danger waves-effect"
                                                                data-bs-dismiss="modal">
                                                                Cancel
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.Edit Modal -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#service_id').change(function() {
            if ($(this).val() !== '') {
                $('#serviceDetails').show();
            } else {
                $('#serviceDetails').hide();
            }
        });

        // Submit form using AJAX
        $('#opdBillForm').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Reload page or update table after successful submission
                    location.reload();
                },
                error: function(error) {
                    console.error('Error:', error);
                    // Handle errors, show validation messages, etc.
                }
            });
        });
    });
</script>
@endsectionp