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

                <div>
                    <h4 class="fw-semibold fs-4 text-dark">Doctor OPD List</h4>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-info btn-rounded m-t-10 mb-2" data-bs-toggle="modal"
                        data-bs-target="#add-contact">
                        Add New Doctor OPD
                    </button>
                </div>
                <!-- Add Contact Popup Model -->
                <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header d-flex align-items-center">
                                <h4 class="modal-title" id="myModalLabel">Add Doctor OPD</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal form-material"
                                    action="{{ route('admin.doctoropd.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-md-12 mb-3">
                                            <input type="text" name="full_name" class="form-control"
                                                placeholder="Doctor Name" required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="number" name="phone" class="form-control" placeholder="Phone"
                                                required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <select name="type" class="form-control" required>
                                                <option value="" disabled selected>Select Department</option>
                                                @foreach($departments as $department)
                                                <option value="{{ $department->name }}">{{ $department->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="text" name="doctor_charges" class="form-control"
                                                placeholder="Doctor Charges" required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="text" name="opd_fee" class="form-control" placeholder="OPD Fee"
                                                required />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-info waves-effect">Save</button>
                                        <button type="button" class="btn btn-danger waves-effect"
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
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Department</th>
                                <th>OPD Fee</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($doctors as $doctor)
                            <tr>
                                <td>{{ $doctor->id }}</td>
                                <td>{{ $doctor->full_name }}</td>
                                <td>{{ $doctor->phone }}</td>
                                <td>{{ $doctor->type }}</td>
                                <td>{{ $doctor->opd_fee }}</td>
                                <td>
                                    <a href="{{ route('admin.doctoropd.show', $doctor->id) }}"
                                        class="btn btn-sm btn-info">View</a>
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#edit-contact-{{ $doctor->id }}">Edit</button>
                                    <form action="{{ route('admin.doctoropd.destroy', $doctor->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                    <!-- Edit Modal -->
                                    <div id="edit-contact-{{ $doctor->id }}" class="modal fade in" tabindex="-1"
                                        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header d-flex align-items-center">
                                                    <h4 class="modal-title" id="myModalLabel">Edit Doctor OPD</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal form-material"
                                                        action="{{ route('admin.doctoropd.update', $doctor->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="form-group">
                                                            <div class="col-md-12 mb-3">
                                                                <input type="text" name="full_name" class="form-control"
                                                                    value="{{ $doctor->full_name }}" required />
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <input type="email" name="email" class="form-control"
                                                                    value="{{ $doctor->email }}" required />
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <input type="number" name="phone" class="form-control"
                                                                    value="{{ $doctor->phone }}" required />
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <select name="type" class="form-control" required>
                                                                    @foreach($departments as $department)
                                                                    <option value="{{ $department->name }}" {{ $doctor->
                                                                        type == $department->name ? 'selected' : ''
                                                                        }}>{{ $department->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <input type="text" name="doctor_charges"
                                                                    class="form-control"
                                                                    value="{{ $doctor->doctor_charges }}" required />
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <input type="text" name="opd_fee" class="form-control"
                                                                    value="{{ $doctor->opd_fee }}" required />
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit"
                                                                class="btn btn-info waves-effect">Update</button>
                                                            <button type="button" class="btn btn-danger waves-effect"
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