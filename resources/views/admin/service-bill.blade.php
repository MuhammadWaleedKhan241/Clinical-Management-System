@extends('admin.admin.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="border-bottom title-part-padding">
                <h4 class="card-title mb-0">Service Bill List</h4>
            </div>
           
            <div class="card-body">
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
                <div>
                    <h4 class="fw-semibold fs-5 text-dark">Service Bill Details</h4>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-sm btn-warning btn-rounded mb-2" data-bs-toggle="modal"
                        data-bs-target="#add-service-bill">
                        Add Service Bill
                    </button>
                </div>

                <!-- Add Service Bill Popup Modal -->
                <div id="add-service-bill" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="addServiceBillLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="addServiceBillLabel">Add Service Bill</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="serviceBillForm" action="{{ route('admin.servicebill.store') }}"
                                    method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="mb-3">
                                            <label for="service_id" class="form-label">Select Service</label>
                                            <select class="form-control" id="service_id" name="service_id" required>
                                                <option value="" disabled selected>Select a service</option>
                                                @foreach($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="patient_id" class="form-label">Select Patient</label>
                                            <select class="form-control" name="patient_id" required>
                                                <option value="" disabled selected>Select Patient</option>
                                                @foreach($patients as $patient)
                                                <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Hidden section -->
                                        <div id="serviceDetails" style="display:;">
                                            <div class="mb-3">
                                                <label for="invoice_no" class="form-label">Invoice Number</label>
                                                <input type="text" class="form-control" id="invoice_no"
                                                    name="invoice_no" placeholder="Enter invoice number" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="service_amount" class="form-label">Service Amount</label>
                                                <input type="text" class="form-control" id="service_amount"
                                                    name="service_amount" placeholder="Enter service amount" required>
                                            </div>
                                            <div class="mb-3">
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

                                        <div class="mb-3">
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

                <!-- Edit Service Bill Popup Modal -->
                @foreach($servicebills as $bill)
                <div id="edit-service-bill-{{ $bill->id }}" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="editServiceBillLabel-{{ $bill->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="editServiceBillLabel-{{ $bill->id }}">Edit Service Bill</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editServiceBillForm-{{ $bill->id }}"
                                    action="{{ route('admin.servicebill.update', $bill->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <div class="mb-3">
                                            <label for="service_id" class="form-label">Select Service</label>
                                            <select class="form-control" id="service_id" name="service_id" required>
                                                <option value="" disabled>Select a service</option>
                                                @foreach($services as $service)
                                                <option value="{{ $service->id }}" {{ $bill->service_id == $service->id
                                                    ? 'selected' : '' }}>
                                                    {{ $service->service_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="patient_id" class="form-label">Select Patient</label>
                                            <select class="form-control" name="patient_id" required>
                                                <option value="" disabled>Select Patient</option>
                                                @foreach($patients as $patient)
                                                <option value="{{ $patient->id }}" {{ $bill->patient_id == $patient->id
                                                    ? 'selected' : '' }}>
                                                    {{ $patient->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div id="editServiceDetails-{{ $bill->id }}" style="display: block;">
                                            <div class="mb-3">
                                                <label for="invoice_no" class="form-label">Invoice Number</label>
                                                <input type="text" class="form-control" id="invoice_no"
                                                    name="invoice_no" value="{{ $bill->invoice_no }}"
                                                    placeholder="Enter invoice number" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="service_amount" class="form-label">Service Amount</label>
                                                <input type="text" class="form-control" id="service_amount"
                                                    name="service_amount" value="{{ $bill->service_amount }}"
                                                    placeholder="Enter service amount" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="payment_type" class="form-label">Payment Type</label>
                                                <select class="form-control" id="payment_type" name="payment_type"
                                                    required>
                                                    <option value="cash" {{ $bill->payment_type == 'cash' ? 'selected' :
                                                        '' }}>Cash</option>
                                                    <option value="credit_card" {{ $bill->payment_type == 'credit_card'
                                                        ? 'selected' : '' }}>Credit Card</option>
                                                    <option value="debit_card" {{ $bill->payment_type == 'debit_card' ?
                                                        'selected' : '' }}>Debit Card</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <input type="date" class="form-control" name="bill_date"
                                                value="{{ $bill->bill_date->format('Y-m-d') }}" placeholder="Bill Date"
                                                required />
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
                @endforeach

                <div class="table-responsive">
                    <table id="demo-foo-addrow" class="table table-bordered table-hover contact-list" data-paging="true"
                        data-paging-size="7">
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
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#edit-service-bill-{{ $bill->id }}">Edit</button>
                                    <form action="{{ route('admin.servicebill.destroy', $bill->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">Delete</button>
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

@push('scripts')
<script>
    document.getElementById('serviceBillForm').addEventListener('submit', function(event) {
event.preventDefault(); // Prevent the default form submission

const form = event.target;
const formData = new FormData(form);

fetch(form.action, {
method: 'POST',
body: formData,
headers: {
'X-Requested-With': 'XMLHttpRequest',
'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
}
})
.then(response => response.json())
.then(data => {
if (data.success) {
alert(data.message);
// Optionally, you can close the modal and refresh the table
$('#add-service-bill').modal('hide');
location.reload(); // This will refresh the page
} else {
alert(data.message);
}
})
.catch(error => {
console.error('Error:', error);
});
});
</script>
@endpush