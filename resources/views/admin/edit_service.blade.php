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
                    <div class="form-group">
                        <div class="col-md-12 mb-3">
                            <input type="text" class="form-control" name="service_name"
                                value="{{ $service->service_name }}" placeholder="Service Name" required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="number" class="form-control" name="price" value="{{ $service->price }}"
                                placeholder="Service Amount" required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <select class="form-select" name="department_id" required>
                                <option value="">Select Department</option>
                                @foreach($departments as $department)
                                <option value="{{ $department->id }}" {{ $service->department_id == $department->id ?
                                    'selected' : '' }}>
                                    {{ $department->department_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info waves-effect">Save</button>
                        <a href="{{ route('service.show') }}" class="btn btn-default waves-effect">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection