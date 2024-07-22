@extends('admin.admin.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <br>
            <br>
            <br>
            <div class="border-bottom title-part-padding">
                <h4 class="card-title mb-1">Edit Service Bill</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.servicebill.update', $servicebill->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="col-md-12 mb-3">
                            <label for="service_id" class="form-label">Select Service</label>
                            <select class="form-control" id="service_id" name="service_id" required>
                                <option value="" disabled>Select a service</option>
                                @foreach($services as $service)
                                <option value="{{ $service->id }}" {{ $servicebill->service_id == $service->id ?
                                    'selected' : '' }}>
                                    {{ $service->service_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="patient_id" class="form-label">Select Patient</label>
                            <select class="form-control" name="patient_id" required>
                                <option value="" disabled>Select Patient</option>
                                @foreach($patients as $patient)
                                <option value="{{ $patient->id }}" {{ $servicebill->patient_id == $patient->id ?
                                    'selected' : '' }}>
                                    {{ $patient->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div id="serviceDetails">
                            <div class="col-md-12 mb-3">
                                <label for="invoice_no" class="form-label">Invoice Number</label>
                                <input type="text" class="form-control" id="invoice_no" name="invoice_no"
                                    value="{{ $servicebill->invoice_no }}" placeholder="Enter invoice number" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="service_amount" class="form-label">Service Amount</label>
                                <input type="text" class="form-control" id="service_amount" name="service_amount"
                                    value="{{ $servicebill->service_amount }}" placeholder="Enter service amount"
                                    required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="payment_type" class="form-label">Payment Type</label>
                                <select class="form-control" id="payment_type" name="payment_type" required>
                                    <option value="" disabled>Select payment type</option>
                                    <option value="cash" {{ $servicebill->payment_type == 'cash' ? 'selected' : ''
                                        }}>Cash</option>
                                    <option value="credit_card" {{ $servicebill->payment_type == 'credit_card' ?
                                        'selected' : '' }}>Credit Card</option>
                                    <option value="debit_card" {{ $servicebill->payment_type == 'debit_card' ?
                                        'selected' : '' }}>Debit Card</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <input type="date" class="form-control" name="bill_date"
                                value="{{ $servicebill->bill_date->format('Y-m-d') }}" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-warning">Update</button>
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection