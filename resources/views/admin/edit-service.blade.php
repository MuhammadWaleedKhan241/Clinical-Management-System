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
                    <h4 class="fw-semibold fs-4 text-dark">Service List</h4>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-info btn-rounded m-t-10 mb-2" data-bs-toggle="modal"
                        data-bs-target="#add-contact">
                        Add New Service
                    </button>
                </div>
                <!-- Add Contact Popup Model -->
                <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header d-flex align-items-center">
                                <h4 class="modal-title" id="myModalLabel">
                                    Add Service
                                </h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal form-material">
                                    <div class="form-group">

                                        <div class="col-md-12 mb-3">
                                            <input type="text" class="form-control" placeholder="Service Name" />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="number" class="form-control" placeholder="Service Amount" />
                                        </div>
                                        <div class="col-md-12 mb-3drop  ">
                                            <input type="text" class="form-control" placeholder="Department" />
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
                                <th>Service</th>
                                <th>Department</th>
                                <th>Amount</th>
                                <th>Actiom</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>

                                <td>Acid Phosphate</td>
                                <td>Hematology</td>
                                <td>$1200</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                    <!-- <button class="btn btn-sm btn-info">Details</button> -->
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>


                                <td>Acid Phosphate</td>
                                <td>Hematology</td>
                                <td>$680</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                    <!-- <button class="btn btn-sm btn-info">Details</button> -->
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>

                                <td>Acid Phosphate</td>
                                <td>Hematology</td>
                                <td>$300</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                    <!-- <button class="btn btn-sm btn-info">Details</button> -->
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>


                                <td>Acid Phosphate</td>
                                <td>Hematology</td>
                                <td>$900</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                    <!-- <button class="btn btn-sm btn-info">Details</button> -->
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Acid Phosphate</td>
                                <td>Hematology</td>
                                <td>$1200</td>

                                <td>
                                    <button class="btn btn-sm btn-primary">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                    <!-- <button class="btn btn-sm btn-info">Details</button> -->
                                </td>
                            </tr>
                            </tr>
                            <tr>
                                <td>6</td>

                                <td>Acid Phosphate</td>
                                <td>Hematology</td>
                                <td>$200</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                    <!-- <button class="btn btn-sm btn-info">Details</button> -->
                                </td>
                            </tr>
                            </tr>
                            <tr>
                                <td>7</td>

                                <td>CBC</td>
                                <td>Hematology</td>
                                <td>$1600</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                    <!-- <button class="btn btn-sm btn-info">Details</button> -->
                                </td>
                            </tr>


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