@extends('admin.admin.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="border-bottom title-part-padding">
                <h4 class="card-title mb-0">Edit Employee</h4>
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

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form class="form-horizontal form-material" action="{{ route('admin.employee.update', $employee->id) }}"
                    method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <div class="col-md-12 mb-3">
                            <input type="text" name="full_name" class="form-control"
                                value="{{ old('full_name', $employee->full_name) }}" placeholder="Full Name" required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="email" name="email" class="form-control"
                                value="{{ old('email', $employee->email) }}" placeholder="Email" required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="number" name="phone" class="form-control"
                                value="{{ old('phone', $employee->phone) }}" placeholder="Phone" required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <select name="type" class="form-control" required>
                                <option value="" disabled>Select Type</option>
                                <option value="Doctor" {{ $employee->type == 'Doctor' ? 'selected' : '' }}>Doctor
                                </option>
                                <option value="Nurse" {{ $employee->type == 'Nurse' ? 'selected' : '' }}>Nurse</option>
                                <option value="Staff" {{ $employee->type == 'Staff' ? 'selected' : '' }}>Staff</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <select name="department" class="form-control" required>
                                <option value="" disabled>Select Department</option>
                                @foreach($departments as $department)
                                <option value="{{ $department->department_name }}" {{ $employee->department ==
                                    $department->department_name ? 'selected' : '' }}>{{ $department->department_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="text" name="address" class="form-control"
                                value="{{ old('address', $employee->address) }}" placeholder="Address" required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="text" name="education" class="form-control"
                                value="{{ old('education', $employee->education) }}" placeholder="Education" required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="text" name="description" class="form-control"
                                value="{{ old('description', $employee->description) }}" placeholder="Description"
                                required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="text" name="certificate" class="form-control"
                                value="{{ old('certificate', $employee->certificate) }}" placeholder="Certificate"
                                required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="text" name="speciality" class="form-control"
                                value="{{ old('speciality', $employee->speciality) }}" placeholder="Speciality"
                                required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="working_days">Working Days</label>
                            <select name="working_days[]" id="working_days" class="form-control" multiple required>
                                @php
                                $working_days = explode(',', $employee->working_days);
                                @endphp
                                <option value="Monday" {{ in_array('Monday', $working_days) ? 'selected' : '' }}>Monday
                                </option>
                                <option value="Tuesday" {{ in_array('Tuesday', $working_days) ? 'selected' : '' }}>
                                    Tuesday</option>
                                <option value="Wednesday" {{ in_array('Wednesday', $working_days) ? 'selected' : '' }}>
                                    Wednesday</option>
                                <option value="Thursday" {{ in_array('Thursday', $working_days) ? 'selected' : '' }}>
                                    Thursday</option>
                                <option value="Friday" {{ in_array('Friday', $working_days) ? 'selected' : '' }}>Friday
                                </option>
                                <option value="Saturday" {{ in_array('Saturday', $working_days) ? 'selected' : '' }}>
                                    Saturday</option>
                                <option value="Sunday" {{ in_array('Sunday', $working_days) ? 'selected' : '' }}>Sunday
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-warning">Update</button>
                        <a href="{{ route('admin.employee.show') }}" class="btn btn-sm btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection