@extends('admin.admin.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="border-bottom title-part-padding">
                <h4 class="card-title mb-0">Edit Service</h4>
            </div>
            <div class="card-body">
                <form class="form-horizontal form-material" action="{{ route('admin.service.update', $service->id) }}"
                    method="POST">
                    @csrf
                    @method('PATCH')
                    <!-- Use PATCH method -->
                    <div class="form-group">
                        <div class="col-md-12 mb-3">
                            <label for="service_name">Service Name</label>
                            <input type="text" name="service_name" id="service_name" class="form-control"
                                value="{{ $service->service_name }}" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="price">Price</label>
                            <input type="text" name="price" id="price" class="form-control"
                                value="{{ $service->price }}" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="department_id">Select Department</label>
                            <select name="department_id" id="department_id" class="form-control" required>
                                @foreach($departments as $department)
                                <option value="{{ $department->id }}" {{ $service->department_id == $department->id ?
                                    'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary waves-effect">Update</button>
                        <a href="{{ route('admin.service.show') }}" class="btn btn-danger waves-effect">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection