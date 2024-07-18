@extends('admin.admin.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="border-bottom title-part-padding">
                <h4 class="card-title mb-0">Package List</h4>
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
                    <h4 class="fw-semibold fs-5 text-dark">Package List</h4>
                </div>
                <br>
                <div class="d-flex justify-content-between mb-2">
                    <button type="button" class="btn btn-sm btn-warning btn-rounded m-t-10" data-bs-toggle="modal"
                        data-bs-target="#add-package">
                        Add New Package
                    </button>
                    <input type="text" id="search" class="form-control w-25" placeholder="Search...">
                </div>
                <!-- Add Package Popup Model -->
                <div id="add-package" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header d-flex align-items-center">
                                <h4 class="modal-title" id="myModalLabel">
                                    Add Package
                                </h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal form-material" action="{{ route('admin.package.store') }}"
                                    method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-md-12 mb-3">
                                            <input type="text" name="package_name" class="form-control"
                                                placeholder="Package Name" required>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <textarea name="description" class="form-control" placeholder="Description"
                                                required></textarea>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="text" name="select_test" class="form-control"
                                                placeholder="Select Test (optional)">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="number" name="price" class="form-control" placeholder="Price"
                                                required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-sm btn-warning">
                                            Save
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">
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
                    <table id="package-table" class="table table-striped m-t-3 table-hover contact-list"
                        data-paging="true" data-paging-size="7">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Package Name</th>
                                <th>Description</th>
                                <th>Select Test</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($packages as $package)
                            <tr>
                                <td>{{ $package->id }}</td>
                                <td>{{ $package->package_name }}</td>
                                <td>{{ $package->description }}</td>
                                <td>{{ $package->select_test }}</td>
                                <td>{{ $package->price }}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#edit-package-{{ $package->id }}">Edit</button>
                                    <form action="{{ route('admin.package.destroy', $package->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this package?')">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Edit Package Modal -->
                            <div id="edit-package-{{ $package->id }}" class="modal fade in" tabindex="-1" role="dialog"
                                aria-labelledby="editPackageLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header d-flex align-items-center">
                                            <h4 class="modal-title" id="editPackageLabel">
                                                Edit Package
                                            </h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal form-material"
                                                action="{{ route('admin.package.update', $package->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <div class="col-md-12 mb-3">
                                                        <input type="text" name="package_name" class="form-control"
                                                            value="{{ $package->package_name }}" required>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <textarea name="description" class="form-control"
                                                            required>{{ $package->description }}</textarea>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <input type="text" name="select_test" class="form-control"
                                                            value="{{ $package->select_test }}">
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <input type="number" name="price" class="form-control"
                                                            value="{{ $package->price }}" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-info waves-effect">
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
                            @endforeach
                        </tbody>
                    </table>
                    {{ $packages->links() }}
                    <!-- Add pagination links -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('search').addEventListener('keyup', function() {
        var value = this.value.toLowerCase();
        var rows = document.querySelectorAll('#package-table tbody tr');

        rows.forEach(function(row) {
            var isVisible = row.textContent.toLowerCase().indexOf(value) !== -1;
            row.style.display = isVisible ? '' : 'none';
        });
    });
</script>
@endsection