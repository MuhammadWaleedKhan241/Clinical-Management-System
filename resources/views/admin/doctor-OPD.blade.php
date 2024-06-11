@extends('admin.admin.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="border-bottom title-part-padding">
                <h4 class="card-title mb-0">Contact Emplyee list</h4>
            </div>
            <div class="card-body">

                <div>
                    <h4 class="fw-semibold fs-4 text-dark">Doctor OPD List</h4>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-info btn-rounded m-t-10 mb-2" data-bs-toggle="modal"
                        data-bs-target="#add-contact">
                        Add New Doctor
                    </button>
                </div>
                <!-- Add Contact Popup Model -->
                <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header d-flex align-items-center">
                                <h4 class="modal-title" id="myModalLabel">
                                    Add Doctor OPD
                                </h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal form-material">
                                    <div class="form-group">
                                        <div class="col-md-12 mb-3">
                                            <input type="text" class="form-control" placeholder="Full Name" />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="email" class="form-control" placeholder="Email" />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="number" class="form-control" placeholder="Phone" />
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <select class="form-control">
                                                <option value="" disabled selected>Select Type</option>
                                                <option value="option1">Doctor 1</option>
                                                <option value="option2">Doctor 2</option>
                                                <option value="option3">Doctor 3</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="text" class="form-control" name="doctor_charges"
                                                placeholder="Doctor chardes" />
                                        </div>
                                        <div class="col-md-12 mb-3drop  ">
                                            <input type="text" class="form-control" placeholder="opd_fee" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info waves-effect" data-bs-dismiss="modal">
                                    Save
                                </button>
                                <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal">
                                    Cancel
                                </button>
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
                                <th>Department</th>
                                <th>OPD Fee</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Saad</td>
                                <td>090078601</td>
                                <td>Hematology</td>
                                <td>$15</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                    <!-- <button class="btn btn-sm btn-info">Details</button> -->
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Ali</td>
                                <td>090078601</td>
                                <td>Monday,Tuesday,Wednesday</td>
                                <td>Doctor</td>
                                <td>
                                    <a href="" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="" class="btn btn-sm btn-danger">Delete</a>
                                    <!-- <button class="btn btn-sm btn-info">Details</button> -->
                                </td>
                            </tr>>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Column -->

        <!-- Column -->

    </div>
</div>

@endsection