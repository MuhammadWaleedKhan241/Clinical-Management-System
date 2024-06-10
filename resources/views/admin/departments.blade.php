@extends('admin.admin.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <br>
            <br>
            <br>
            <div class="card-body">
                <div>
                    <h4 class="fw-semibold fs-4 text-dark">Department List</h4>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-info btn-rounded m-t-10 mb-2" data-bs-toggle="modal"
                        data-bs-target="#add-contact">
                        Add New Department
                    </button>
                </div>
                <!-- Add Contact Popup Model -->
                <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header d-flex align-items-center">
                                <h4 class="modal-title" id="myModalLabel">
                                    Add new Department </h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {{-- action="{{route('department.store') }}" method="post" --}}
                                <form class="form-horizontal form-material">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-md-12 mb-3">
                                            <input type="text" class="form-control" placeholder="Department name" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info waves-effect" data-bs-dismiss="modal">
                                    Save
                                </button>
                                <button type="button" class="btn btn-default waves-effect" data-bs-dismiss="modal">
                                    Cancel
                                </button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <div class="table-responsive">
                    <table id="demo-foo-addrow" class="
                                    table table-bordered
                                    m-t-30
                                    table-hover
                                    contact-list
                                  " data-paging="true" data-paging-size="7">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Departments</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Hematology</td>
                                <td>
                                    <a class="btn btn-sm btn-primary">Edit</a>
                                    <a class="btn btn-sm btn-danger">Delete</a>
                                    <!-- <button class="btn btn-sm btn-info">Details</button> -->
                                </td>
                            </tr>
                   
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection