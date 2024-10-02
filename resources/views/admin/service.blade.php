@extends('admin.admin.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="border-bottom title-part-padding">
                <h4 class="card-title mb-0">Service List</h4>
            </div>
            <div class="card-body">
                <!-- Alert Messages -->
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
                    <h4 class="fw-semibold fs-5 text-dark">Services List</h4>
                </div>
                <br>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <button type="button" class="btn btn-sm btn-warning btn-rounded m-t-10 mb-2"
                            data-bs-toggle="modal" data-bs-target="#add-service">
                            Add New Service
                        </button>
                    </div>
                    <div class="w-25">
                        <form action="{{ route('admin.service.show') }}" method="GET">
                            <input type="text" name="search" id="search" class="form-control float-end"
                                placeholder="Search..." value="{{ request()->input('search') }}">
                        </form>
                    </div>
                </div>

                <!-- Add Service Popup Modal -->
                <div id="add-service" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header d-flex align-items-center">
                                <h4 class="modal-title" id="myModalLabel">Add Service</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal form-material" action="{{ route('admin.service.store') }}"
                                    method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-md-12 mb-3">
                                            <input type="text" class="form-control" name="service_name"
                                                placeholder="Service Name" required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="number" class="form-control" name="price"
                                                placeholder="Service Amount" required />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <select class="form-select" name="department_id" required>
                                                <option value="">Select Department</option>
                                                @foreach($departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->department_name }}
                                                </option>
                                                @endforeach
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
                    </div>
                </div>

                <!-- Search Filter -->
                <div class="table-responsive">
                    <table id="demo-foo-addrow"
                        class="table table-striped table-hover table-bordered m-t-30 table-hover contact-list"
                        data-paging="true" data-paging-size="7">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Service</th>
                                <th>Department</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                            <tr>
                                <td>{{ $service->id }}</td>
                                <td>{{ $service->service_name }}</td>
                                <td>
                                    @if($service->department)
                                    {{ $service->department->department_name }}
                                    @else
                                    <span class="text-danger">No Department</span>
                                    @endif
                                </td>
                                <td>${{ $service->price }}</td>
                                <td class="justify-content-between">
                                    <a href="{{ route('admin.service.edit', $service->id) }}"
                                        class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                    <form action="{{ route('admin.service.destroy', $service->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>
                                            Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Links -->
                <div class="d-flex justify-content-center">
                    {{ $services->appends(request()->input())->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('search').addEventListener('keyup', function() {
        this.form.submit(); // Submit the form to trigger the search
    });
</script>
@endsection