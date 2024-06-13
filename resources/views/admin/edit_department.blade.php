@extends('admin.admin.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="border-bottom title-part-padding">
                <h4 class="card-title mb-0">Edit Department</h4>
            </div>
            <div class="card-body">
                <form class="form-horizontal form-material"
                    action="{{ route('admin.department.update', $department->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <div class="col-md-12 mb-3">
                            <input type="text" class="form-control" placeholder="Department Name" name="department_name"
                                value="{{ $department->department_name }}" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info waves-effect">
                            Save
                        </button>
                        <a href="{{ route('admin.department.show') }}" class="btn btn-danger waves-effect">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection