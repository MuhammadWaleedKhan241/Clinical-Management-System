@extends('admin.admin.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="border-bottom title-part-padding">
                <h4 class="card-title mb-0">Contact Patient List</h4>
            </div>
            <div class="card-body">

                <div>
                    <h4 class="fw-semibold fs-4 text-dark">Patient List</h4>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-info btn-rounded m-t-10 mb-2" data-bs-toggle="modal"
                        data-bs-target="#add-patient">
                        Add New Patient
                    </button>
                </div>
                <!-- Add Patient Popup Modal -->
                <div id="add-patient" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header d-flex align-items-center">
                                <h4 class="modal-title" id="myModalLabel">
                                    Add Patient
                                </h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal form-material" action="{{ route('admin.patient.store') }}"
                                    method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-md-12 mb-3">
                                            <input type="text" class="form-control" placeholder="Full Name" name="name"
                                                required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="email" class="form-control" placeholder="Email" name="email"
                                                required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="number" class="form-control" placeholder="Phone" name="phone"
                                                required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <select class="form-control" name="gender" required>
                                                <option value="" disabled selected>Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <select class="form-control" name="marital_status" required>
                                                <option value="" disabled selected>Marital Status</option>
                                                <option value="single">Single</option>
                                                <option value="married">Married</option>
                                                <option value="divorced">Divorced</option>
                                                <option value="widowed">Widowed</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <select class="form-control" name="blood_group" required>
                                                <option value="" disabled selected>Blood Group</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="date" class="form-control" placeholder="Date of Birth"
                                                name="dob" required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="number" class="form-control" placeholder="Age" name="age"
                                                required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="text" class="form-control" placeholder="Relative Name"
                                                name="relative_name" required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="text" class="form-control" placeholder="Relative Phone"
                                                name="relative_phone" required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="text" class="form-control" placeholder="Country" name="country"
                                                required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="text" class="form-control" placeholder="State" name="state"
                                                required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="text" class="form-control" placeholder="District"
                                                name="district" required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="text" class="form-control" placeholder="Location"
                                                name="location" required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="text" class="form-control" placeholder="Occupation"
                                                name="occupation" required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <textarea class="form-control" placeholder="Description" name="description"
                                                required></textarea>
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
                    <table id="demo-foo-addrow" class="table table-bordered m-t-3 table-hover contact-list"
                        data-paging="true" data-paging-size="7">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($patients as $patient)
                            <tr>
                                <td>{{ $patient->id }}</td>
                                <td>{{ $patient->name }}</td>
                                <td>{{ $patient->phone }}</td>
                                <td>{{ $patient->address }}</td>
                                <td>{{ $patient->email }}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Details</button>
                                    <a href="{{ route('admin.patient.edit', $patient->id) }}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.patient.destroy', $patient->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div class="pagination" id="pagination">
                    {{ $patients->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection