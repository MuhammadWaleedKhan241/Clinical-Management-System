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
                    <h4 class="fw-semibold fs-5 text-dark">Service Bill Details</h4>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-sm btn-warning btn-rounded m-t-10 mb-2" data-bs-toggle="modal"
                        data-bs-target="#add-service-bill">
                        Add Service Bill
                    </button>
                </div>

                <!-- Add Service Bill Popup Modal -->
                <div id="add-service-bill" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header d-flex align-items-center">
                                <h4 class="modal-title" id="myModalLabel">Add Service Bill</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="serviceBillForm" action="{{ route('admin.servicebill.store') }}"
                                    method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-md-12 mb-3">
                                            <label for="service_id" class="form-label">Select Service</label>
                                            <select class="form-control" id="service_id" name="service_id" required>
                                                <option value="" disabled selected>Select a service</option>
                                                @foreach($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="patient_id" class="form-label">Select Patient</label>
                                            <select class="form-control" name="patient_id" required>
                                                <option value="" disabled selected>Select Patient</option>
                                                @foreach($patients as $patient)
                                                <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Hidden section -->
                                        <div id="serviceDetails" style="display:none;">
                                            <div class="col-md-12 mb-3">
                                                <label for="invoice_no" class="form-label">Invoice Number</label>
                                                <input type="text" class="form-control" id="invoice_no"
                                                    name="invoice_no" placeholder="Enter invoice number" required>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="service_amount" class="form-label">Service Amount</label>
                                                <input type="text" class="form-control" id="service_amount"
                                                    name="service_amount" placeholder="Enter service amount" required>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="payment_type" class="form-label">Payment Type</label>
                                                <select class="form-control" id="payment_type" name="payment_type"
                                                    required>
                                                    <option value="" disabled selected>Select payment type</option>
                                                    <option value="cash">Cash</option>
                                                    <option value="credit_card">Credit Card</option>
                                                    <option value="debit_card">Debit Card</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <input type="date" class="form-control" name="bill_date"
                                                placeholder="Bill Date" required />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-sm btn-warning">Save</button>
                                        <button type="button" class="btn btn-sm btn-danger"
                                            data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="demo-foo-addrow" class="table table-bordered m-t-3 table-hover contact-list"
                        data-paging="true" data-paging-size="7">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Service Name</th>
                                <th>Patient Name</th>
                                <th>Amount</th>
                                <th>Bill Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($servicebills as $bill)
                            <tr>
                                <td>{{ $bill->id }}</td>
                                <td>{{ $bill->service->service_name }}</td>
                                <td>{{ $bill->patient->name }}</td>
                                <td>{{ number_format($bill->service_amount, 2) }}</td>
                                <td>{{ $bill->bill_date->format('Y-m-d') }}</td>
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

        $('#serviceBillForm').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                success: function(response) {
                    alert('Service bill saved successfully!');
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const serviceSelect = document.getElementById('service_id');
        const serviceDetails = document.getElementById('serviceDetails');

        // Show serviceDetails when a service is selected
        serviceSelect.addEventListener('change', function() {
            if (serviceSelect.value) {
                serviceDetails.style.display = 'block'; // Show the hidden fields
            } else {
                serviceDetails.style.display = 'none'; // Hide the hidden fields
            }
        });

        // Optional: Hide serviceDetails on page load if no service is selected
        if (!serviceSelect.value) {
            serviceDetails.style.display = 'none';
        }
    });
</script>
@endsection