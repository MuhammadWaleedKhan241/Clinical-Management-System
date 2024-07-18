@extends('admin.admin.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="border-bottom title-part-padding">
                <h4 class="card-title mb-0">Contact Employee List</h4>
            </div>
            <div class="card-body">

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <div>
                    <h4 class="fw-semibold fs-4 text-dark">Employee List</h4>
                </div>
                <br>

                <div class="d-flex justify-content-between mb-2">
                    <button type="button" class="btn btn-sm btn-warning btn-rounded m-t-10" data-bs-toggle="modal"
                        data-bs-target="#add-contact">
                        Add New Employee
                    </button>
                    <input type="text" id="search" class="form-control w-25" placeholder="Search...">
                </div>

                <!-- Add Contact Popup Modal -->
                <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header d-flex align-items-center">
                                <h4 class="modal-title" id="myModalLabel">
                                    Add Employee
                                </h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal form-material" action="{{ route('admin.employee.store') }}"
                                    method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-md-12 mb-3">
                                            <input type="text" name="full_name" class="form-control"
                                                placeholder="Full Name" required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="email" name="email" class="form-control" placeholder="Email"
                                                required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="number" name="phone" class="form-control" placeholder="Phone"
                                                required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <select name="type" class="form-control" required>
                                                <option value="" disabled selected>Select Type</option>
                                                <option value="Doctor">Doctor</option>
                                                <option value="Nurse">Nurse</option>
                                                <option value="Staff">Staff</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <select name="department" class="form-control" required>
                                                <option value="" disabled selected>Select Department</option>
                                                <option value="Cardiology">Cardiology</option>
                                                <option value="Neurology">Neurology</option>
                                                <option value="Oncology">Oncology</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="text" name="address" class="form-control" placeholder="Address"
                                                required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="text" name="education" class="form-control"
                                                placeholder="Education" required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="text" name="description" class="form-control"
                                                placeholder="Description" required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="text" name="certificate" class="form-control"
                                                placeholder="Certificate" required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="text" name="speciality" class="form-control"
                                                placeholder="Speciality" required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="text" name="working_days" class="form-control"
                                                placeholder="Working Days" required />
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
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>

                <div class="table-responsive">
                    <table id="employee-table"
                        class="table table-striped table-hover table-bordered m-t-3 table-hover contact-list"
                        data-paging="true" data-paging-size="7">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Working Days</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                            <tr>
                                <td>{{ $employee->id }}</td>
                                <td>{{ $employee->full_name }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->working_days }}</td>
                                <td>{{ $employee->type }}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#edit-contact-{{ $employee->id }}">Edit</button>
                                    <form action="{{ route('admin.employee.destroy', $employee->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                    <!-- Add edit modal -->
                                    <div id="edit-contact-{{ $employee->id }}" class="modal fade in" tabindex="-1"
                                        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header d-flex align-items-center">
                                                    <h4 class="modal-title" id="myModalLabel">
                                                        Edit Employee
                                                    </h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal form-material" method="POST"
                                                        action="{{ route('admin.employee.update', $employee->id) }}">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="form-group">
                                                            <div class="col-md-12 mb-3">
                                                                <input type="text" class="form-control" name="full_name"
                                                                    value="{{ $employee->full_name }}" required />
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <input type="email" class="form-control" name="email"
                                                                    value="{{ $employee->email }}" required />
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <input type="number" class="form-control" name="phone"
                                                                    value="{{ $employee->phone }}" required />
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <select class="form-control" name="type" required>
                                                                    <option value="Doctor" {{ $employee->type ==
                                                                        'Doctor' ? 'selected' : '' }}>Doctor</option>
                                                                    <option value="Nurse" {{ $employee->type == 'Nurse'
                                                                        ? 'selected' : '' }}>Nurse</option>
                                                                    <option value="Staff" {{ $employee->type == 'Staff'
                                                                        ? 'selected' : '' }}>Staff</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <select class="form-control" name="department" required>
                                                                    <option value="Cardiology" {{ $employee->department
                                                                        == 'Cardiology' ? 'selected' : '' }}>Cardiology
                                                                    </option>
                                                                    <option value="Neurology" {{ $employee->department
                                                                        == 'Neurology' ? 'selected' : '' }}>Neurology
                                                                    </option>
                                                                    <option value="Oncology" {{ $employee->department ==
                                                                        'Oncology' ? 'selected' : '' }}>Oncology
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <input type="text" class="form-control" name="address"
                                                                    value="{{ $employee->address }}" required />
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <input type="text" class="form-control" name="education"
                                                                    value="{{ $employee->education }}" required />
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <input type="text" class="form-control"
                                                                    name="description"
                                                                    value="{{ $employee->description }}" required />
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <input type="text" class="form-control"
                                                                    name="certificate"
                                                                    value="{{ $employee->certificate }}" required />
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <input type="text" class="form-control"
                                                                    name="speciality"
                                                                    value="{{ $employee->speciality }}" required />
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <input type="text" class="form-control"
                                                                    name="working_days"
                                                                    value="{{ $employee->working_days }}" required />
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-info waves-effect">
                                                                Update
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
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
</div>

<script>
    document.getElementById('search').addEventListener('keyup', function() {
        var value = this.value.toLowerCase();
        var rows = document.querySelectorAll('#employee-table tbody tr');

        rows.forEach(function(row) {
            var isVisible = row.textContent.toLowerCase().indexOf(value) !== -1;
            row.style.display = isVisible ? '' : 'none';
        });
    });
</script>
@endsection