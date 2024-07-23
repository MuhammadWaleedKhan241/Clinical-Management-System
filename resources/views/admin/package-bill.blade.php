@extends('admin.admin.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="border-bottom title-part-padding">
                <h4 class="card-title mb-0">Contact Patient List</h4>
            </div>
            <div class="card-body">
                <!-- Alert Message -->
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <h4 class="fw-semibold fs-4 text-dark">Package Bill List</h4>
                    </div>
                    <div>
                        <input type="text" id="searchBar" class="form-control" placeholder="Search...">
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-info btn-rounded m-t-10 mb-2" data-bs-toggle="modal"
                        data-bs-target="#add-contact">
                        Add New Patient
                    </button>
                </div>
                <!-- Add Contact Popup Model -->
                <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                                <form class="form-horizontal form-material">
                                    <div class="form-group">
                                        <div class="col-md-12 mb-3">
                                            <select class="form-control">
                                                <option value="" disabled selected>Select Package</option>
                                                <option value="option1">Option 1</option>
                                                <option value="option2">Option 2</option>
                                                <option value="option3">Option 3</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <select class="form-control">
                                                <option value="" disabled selected>Select Patient</option>
                                                <option value="option1">Option 1</option>
                                                <option value="option2">Option 2</option>
                                                <option value="option3">Option 3</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                                <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal">
                                    Cancel
                                </button>
                                <button type="button" class="btn btn-info waves-effect" data-bs-dismiss="modal">
                                    Save
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
                                <th>Package Name</th>
                                <th>Patient Name</th>
                                {{-- <th>Doctor</th> --}}
                                {{-- <th>Description</th> --}}
                                {{-- <th>Date</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Saad</td>
                                <td>Ali</td>
                                <td>Thursday</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Details</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Saad</td>
                                <td>Ali</td>
                                <td>Friday</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Details</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('searchBar').addEventListener('input', function () {
        var filter = this.value.toLowerCase();
        var rows = document.querySelectorAll('.contact-list tbody tr');
        rows.forEach(function(row) {
            var text = row.textContent.toLowerCase();
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    });
</script>
@endsection