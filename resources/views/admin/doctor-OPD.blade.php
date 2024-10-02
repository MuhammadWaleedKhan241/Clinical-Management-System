@extends('admin.admin.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="border-bottom title-part-padding">
                <h4 class="card-title mb-0">Doctor OPD List</h4>
            </div>
            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="fw-semibold fs-5 text-dark">OPD Doctor List</h4>
                    <button type="button" class="btn btn-sm btn-warning btn-rounded" data-bs-toggle="modal"
                        data-bs-target="#add-contact">
                        Add Doctor OPD
                    </button>
                </div>

                <!-- Add Contact Popup Modal -->
                <div id="add-contact" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="addDoctorModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="addDoctorModalLabel">Add Doctor OPD</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.doctoropd.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <select class="form-control" id="doctor_id" name="doctor_id" required>
                                            <option value="" disabled selected>Select a doctor</option>
                                            @foreach($doctors as $doctor)
                                            <option value="{{ $doctor->name }}">{{ $doctor->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="tel" name="phone" value="phone" class="form-control"
                                            placeholder="Phone" pattern="^(?:\+92|0)?3[0-9]{2}[0-9]{7}$" required />
                                    </div>
                                    <div class="form-group mb-3">
                                        <select name="department" class="form-control" required>
                                            <option value="department_name" disabled selected>Select Department</option>
                                            @foreach($departments as $department)
                                            <option value="{{ $department->department_name }}">{{
                                                $department->department_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="text" name="doctor_charges" value="doctor_charges"
                                            class="form-control" placeholder="Doctor Charges" required />
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="text" value="opd_fee" name="opd_fee" class="form-control"
                                            placeholder="OPD Fee" required />
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-warning">Save</button>
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Add Contact Modal -->

                <div class="table-responsive">
                    <table id="doctor-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Department</th>
                                <th>OPD Fee</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($doctorOPDs as $doctor)
                            <tr>
                                <td>{{ $doctor->id }}</td>
                                <td>{{ $doctor->name }}</td>
                                <td>{{ $doctor->phone }}</td>
                                <td>{{ $doctor->department }}</td>
                                <td>{{ $doctor->opd_fee }}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#edit-contact-{{ $doctor->id }}">Edit</button>
                                    <form action="{{ route('admin.doctoropd.destroy', $doctor->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this doctor?')">Delete</button>
                                    </form>

                                    <!-- Edit Modal -->
                                    <div id="edit-contact-{{ $doctor->id }}" class="modal fade" tabindex="-1"
                                        role="dialog" aria-labelledby="editDoctorModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="editDoctorModalLabel">Edit Doctor OPD
                                                    </h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.doctoropd.update', $doctor->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="form-group mb-3">
                                                            <input type="text" name="name" class="form-control"
                                                                value="{{ $doctor->name }}" required />
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <input type="tel" name="phone" class="form-control"
                                                                value="{{ $doctor->phone }}"
                                                                pattern="^(?:\+92|0)?3[0-9]{2}[0-9]{7}$" required />
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <select name="department" class="form-control" required>
                                                                @foreach($departments as $department)
                                                                <option value="{{ $department->department_name }}" {{
                                                                    $doctor->department == $department->department_name
                                                                    ? 'selected' : '' }}>
                                                                    {{ $department->department_name }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <input type="text" name="doctor_charges"
                                                                class="form-control"
                                                                value="{{ $doctor->doctor_charges }}" required />
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <input type="text" name="opd_fee" class="form-control"
                                                                value="{{ $doctor->opd_fee }}" required />
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
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#doctor-table').DataTable(); // Use DataTables for better table management
    });
</script>
@endsection