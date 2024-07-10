@extends('admin.admin.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="border-bottom title-part-padding">
                <h4 class="card-title mb-0">Service Bill List</h4>
            </div>
            <div class="card-body">

                <div>
                    <h4 class="fw-semibold fs-4 text-dark">Service Bill List</h4>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-info btn-rounded m-t-10 mb-2" data-bs-toggle="modal"
                        data-bs-target="#add-service-bill">
                        Add Service Bill
                    </button>
                </div>
                <!-- Add Service Bill Popup Modal -->
                <div id="add-service-bill" class="modal fade in" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header d-flex align-items-center">
                                <h4 class="modal-title" id="myModalLabel">
                                    Add Service Bill
                                </h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal form-material"
                                    action="{{ route('admin.servicebill.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-md-12 mb-3">
                                            <input type="text" class="form-control" name="customer_name"
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
                                            <select class="form-control" id="service_id" name="service_id">
                                                <option value="" disabled selected>Select a service</option>
                                                @foreach($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div id="serviceDetails" style="display: none;">
                                            <div class="col-md-12 mb-3">
                                                <label for="payment_type" class="form-label">Payment Type</label>
                                                <select class="form-control" id="payment_type" name="payment_type">
                                                    <option value="" disabled selected>Select payment type</option>
                                                    <option value="cash">Cash</option>
                                                    <option value="credit_card">Credit Card</option>
                                                    <option value="debit_card">Debit Card</option>
                                                    <!-- Add more options as needed -->
                                                </select>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label for="invoice_no" class="form-label">Invoice Number</label>
                                                <input type="text" class="form-control" id="invoice_no"
                                                    name="invoice_no" placeholder="Enter invoice number">
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label for="service_amount" class="form-label">Service Amount</label>
                                                <input type="text" class="form-control" id="service_amount"
                                                    name="service_amount" placeholder="Enter service amount">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
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
                            @foreach($servicebills as $bill)
                            <tr>
                                <td>{{ $bill->id }}</td>
                                <td>{{ $bill->patient_name }}</td>
                                <td>{{ $bill->amount }}</td>
                                <td>{{ $bill->bill_date }}</td>
                                <td>{{ $bill->service->service_name }}</td>
                                <td>{{ $bill->patient->patient_name }}</td>
                                <td>
                                    <a href="{{ route('admin.servicebill.edit', $bill->id) }}"
                                        class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('admin.servicebill.destroy', $bill->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this service bill?')">Delete</button>
                                    </form>
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
    });
</script>
@endsection