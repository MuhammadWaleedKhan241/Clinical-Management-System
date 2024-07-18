@extends('admin.admin.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="border-bottom title-part-padding">
                <h4 class="card-title mb-0">Contact Patient List</h4>
            </div>
            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div>
                    <h4 class="fw-semibold fs-4 text-dark">Appointment List</h4>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-info btn-rounded m-t-10 mb-2" data-bs-toggle="modal"
                        data-bs-target="#add-appointment">
                        Add New Appointment
                    </button>
                </div>
                <!-- Add Appointment Popup Modal -->
                <div id="add-appointment" class="modal fade in" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header d-flex align-items-center">
                                <h4 class="modal-title" id="myModalLabel">
                                    Add Appointment
                                </h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal form-material"
                                    action="{{ route('admin.appointment.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-md-12 mb-3">
                                            <label for="patient_id">Select Patient</label>
                                            <select name="patient_id" id="patient_id" class="form-control">
                                                <option value="" disabled selected>Select a patient</option>
                                                @foreach($patients as $patient)
                                                <option value="{{ $patient->id }}">
                                                    {{ $patient->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="patient_email">Patient Email</label>
                                            <input type="email" name="patient_email" id="patient_email"
                                                class="form-control" readonly>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="patient_phone">Patient Phone</label>
                                            <input type="text" name="patient_phone" id="patient_phone"
                                                class="form-control" readonly>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="text" class="form-control" placeholder="Doctor Name"
                                                name="doctor" required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <textarea class="form-control" placeholder="Description" name="description"
                                                required></textarea>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="date" class="form-control" placeholder="Appointment Date"
                                                name="appointment_date" required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="time" class="form-control" placeholder="Appointment Time"
                                                name="appointment_time" required />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary waves-effect">
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
                    <table id="appointmentTable" class="table table-bordered m-t-3 table-hover contact-list"
                        data-paging="true" data-paging-size="7">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Patient Name</th>
                                <th>Doctor</th>
                                <th>Description</th>
                                <th>Appointment Date</th>
                                <th>Appointment Time</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->id }}</td>
                                <td>{{ $appointment->patient_name }}</td>
                                <td>{{ $appointment->doctor }}</td>
                                <td>{{ $appointment->description }}</td>
                                <td>{{ $appointment->appointment_date }}</td>
                                <td>{{ $appointment->appointment_time }}</td>
                                <td>{{ $appointment->status }}</td>
                                <td>
                                    <a href="{{ route('admin.appointment.edit', $appointment->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.appointment.destroy', $appointment->id) }}"
                                        method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this appointment?')">Delete</button>
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
    document.addEventListener('DOMContentLoaded', function () {
        var searchInput = document.getElementById('search');
        var table = document.getElementById('appointmentTable').getElementsByTagName('tbody')[0];

        searchInput.addEventListener('keyup', function () {
            var filter = searchInput.value.toLowerCase();
            var rows = table.getElementsByTagName('tr');

            for (var i = 0; i < rows.length; i++) {
                var cells = rows[i].getElementsByTagName('td');
                var match = false;
                for (var j = 0; j < cells.length; j++) {
                    if (cells[j].innerHTML.toLowerCase().indexOf(filter) > -1) {
                        match = true;
                        break;
                    }
                }
                rows[i].style.display = match ? '' : 'none';
            }
        });

        var patientSelect = document.getElementById('patient_id');
        var patientEmailInput = document.getElementById('patient_email');
        var patientPhoneInput = document.getElementById('patient_phone');

        patientSelect.addEventListener('change', function () {
            var selectedOption = patientSelect.options[patientSelect.selectedIndex];
            var selectedPatient = @json($patients).find(patient => patient.id == selectedOption.value);

            if (selectedPatient) {
                patientEmailInput.value = selectedPatient.email;
                patientPhoneInput.value = selectedPatient.phone;
            } else {
                patientEmailInput.value = '';
                patientPhoneInput.value = '';
            }
        });
    });
</script>
@endsection