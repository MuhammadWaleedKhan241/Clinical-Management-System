@extends('admin.admin.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="border-bottom title-part-padding">
                <h4 class="card-title mb-0">Department List</h4>
            </div>
            <div class="card-body">
                <!-- Success and Error Messages -->
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div>
                    <h4 class="fw-semibold fs-5 text-dark">Department List</h4>
                </div>
                <br>
                <div class="d-flex justify-content-between mb-3">
                    <button type="button" class="btn btn-sm btn-warning btn-rounded" data-bs-toggle="modal"
                        data-bs-target="#add-contact">
                        Add New Department
                    </button>

                    <div class="w-25">
                        <input type="text" id="search" class="form-control float-end" placeholder="Search...">
                    </div>
                </div>

                <!-- Add Department Popup Modal -->
                <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header d-flex align-items-center">
                                <h4 class="modal-title" id="myModalLabel">Add New Department</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal form-material"
                                    action="{{ route('admin.department.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-md-12 mb-3">
                                            <input type="text" class="form-control" name="department_name"
                                                placeholder="Department name" required />
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
                    </div>
                </div>

                <!-- Department List Table -->
                <div class="table-responsive">
                    <table id="demo-foo-addrow"
                        class="table table-striped table-hover table-bordered m-t-30 table-hover contact-list"
                        data-paging="true" data-paging-size="7">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Department Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($departments as $department)
                            <tr>
                                <td>{{ $department->id }}</td>
                                <td>{{ $department->department_name }}</td>
                                <td class=" justify-content-between">
                                    <a href="{{ route('admin.department.edit', $department->id) }}"
                                        class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.department.destroy', $department->id) }}"
                                        method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this department?')">
                                            <i class="fa fa-trash"></i> Delete</button>

                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $departments->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('search').addEventListener('keyup', function() {
        var value = this.value.toLowerCase().trim();
        var rows = document.querySelectorAll('#demo-foo-addrow tbody tr');

        rows.forEach(function(row) {
            var departmentName = row.querySelector('td:nth-child(2)').textContent.toLowerCase().trim();

            if (departmentName.includes(value)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
@endsection