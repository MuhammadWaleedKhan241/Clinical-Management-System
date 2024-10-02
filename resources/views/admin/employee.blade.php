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

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
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
                    <input type="text" id="search" class="form-control w-25" placeholder="Search..."
                        value="{{ request('search') }}">
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
                                            <input type="tel" name="phone" class="form-control"
                                                placeholder="Phone, +92 300 1234567"
                                                pattern="^(?:\+92|0)?3[0-9]{2}[0-9]{7}$" required />
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
                                                @foreach($departments as $department)
                                                <option value="{{ $department->department_name }}">{{
                                                    $department->department_name }}</option>
                                                @endforeach
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
                                            <label for="working_days">Working Days</label>
                                            <select name=" []" id="working_days" class="form-control" multiple required>
                                                <option value="Monday">Monday</option>
                                                <option value="Tuesday">Tuesday</option>
                                                <option value="Wednesday">Wednesday</option>
                                                <option value="Thursday">Thursday</option>
                                                <option value="Friday">Friday</option>
                                                <option value="Saturday">Saturday</option>
                                                <option value="Sunday">Sunday</option>
                                            </select>
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
                            @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->id }}</td>
                                <td>{{ $employee->full_name }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->working_days }}</td>
                                <td>{{ $employee->type }}</td>
                                <td class="d-flex justify-content-between">
                                    <a href="{{ route('admin.employee.edit', $employee->id) }}"
                                        class="btn btn-sm btn-warning text-white">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.employee.destroy', $employee->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger text-white"
                                            onclick="return confirm('Are you sure you want to delete this employee?')">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center">
                    {{ $employees->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#search').on('keyup', function () {
            var value = $(this).val().toLowerCase();
            $('#employee-table tbody tr').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

{{-- phone --}}

<script>
    $(document).ready(function () {
        $('#add-contact form').on('submit', function () {
            var phone = $('input[name="phone"]').val();
            var phonePattern = /^(?:\+92|0)?(?:3[0-9]{2}|2[0-9]{1})[0-9]{7}$/;

            if (!phonePattern.test(phone)) {
                alert('Please enter a valid Pakistani phone number.');
                return false; // Prevent form submission
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
    $('#search').on('keyup', function (event) {
    if (event.key === "Enter") { // Only search when the Enter key is pressed
    var searchQuery = $(this).val();
    var url = new URL(window.location.href);
    url.searchParams.set('search', searchQuery);
    window.location.href = url.toString();
    }
    });
    });
</script>

@endsection