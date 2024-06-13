@extends('admin.admin.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
        


            <div class="card-body">
                {{-- <div>
                    <h4 class="fw-semibold fs-4 text-dark">Edit Appointment</h4>
                </div> --}}
                <div class="border-bottom title-part-padding">
                    <h4 class="card-title mb-0">Edit Appointment</h4>
                </div>
                <form class="form-horizontal form-material"
                    action="{{ route('admin.appointment.update', $appointment->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <div class="col-md-12 mb-3">
                            <input type="text" class="form-control" placeholder="Patient Name" name="patient_name"
                                value="{{ $appointment->patient_name }}" required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="text" class="form-control" placeholder="Doctor Name" name="doctor"
                                value="{{ $appointment->doctor }}" required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="text" class="form-control" placeholder="Description" name="description"
                                value="{{ $appointment->description }}" required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="date" class="form-control" placeholder="Appointment Date"
                                name="appointment_date" value="{{ $appointment->appointment_date }}" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info waves-effect">
                            Save
                        </button>
                        <a href="{{ route('admin.appointment.show') }}" class="btn btn-danger waves-effect">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection