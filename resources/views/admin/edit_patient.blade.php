@extends('admin.admin.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="border-bottom title-part-padding">
                <h4 class="card-title mb-0">Edit Patient</h4>
            </div>
            <div class="card-body">
                <form class="form-horizontal form-material" action="{{ route('admin.patient.update', $patient->id) }}"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="col-md-12 mb-3">
                            <input type="text" class="form-control" placeholder="Full Name" name="name"
                                value="{{ $patient->name }}" required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="email" class="form-control" placeholder="Email" name="email"
                                value="{{ $patient->email }}" required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="number" class="form-control" placeholder="Phone" name="phone"
                                value="{{ $patient->phone }}" required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <select class="form-control" name="gender" required>
                                <option value="" disabled>Gender</option>
                                <option value="male" {{ $patient->gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ $patient->gender == 'female' ? 'selected' : '' }}>Female
                                </option>
                                <option value="other" {{ $patient->gender == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <select class="form-control" name="marital_status" required>
                                <option value="" disabled>Marital Status</option>
                                <option value="single" {{ $patient->marital_status == 'single' ? 'selected' : ''
                                    }}>Single</option>
                                <option value="married" {{ $patient->marital_status == 'married' ? 'selected' : ''
                                    }}>Married</option>
                                <option value="divorced" {{ $patient->marital_status == 'divorced' ? 'selected' : ''
                                    }}>Divorced</option>
                                <option value="widowed" {{ $patient->marital_status == 'widowed' ? 'selected' : ''
                                    }}>Widowed</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <select class="form-control" name="blood_group" required>
                                <option value="" disabled>Blood Group</option>
                                <option value="A+" {{ $patient->blood_group == 'A+' ? 'selected' : '' }}>A+</option>
                                <option value="A-" {{ $patient->blood_group == 'A-' ? 'selected' : '' }}>A-</option>
                                <option value="B+" {{ $patient->blood_group == 'B+' ? 'selected' : '' }}>B+</option>
                                <option value="B-" {{ $patient->blood_group == 'B-' ? 'selected' : '' }}>B-</option>
                                <option value="AB+" {{ $patient->blood_group == 'AB+' ? 'selected' : '' }}>AB+</option>
                                <option value="AB-" {{ $patient->blood_group == 'AB-' ? 'selected' : '' }}>AB-</option>
                                <option value="O+" {{ $patient->blood_group == 'O+' ? 'selected' : '' }}>O+</option>
                                <option value="O-" {{ $patient->blood_group == 'O-' ? 'selected' : '' }}>O-</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="date" class="form-control" name="dob" value="{{ $patient->dob }}" required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="number" class="form-control" placeholder="Age" name="age"
                                value="{{ $patient->age }}" required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="text" class="form-control" placeholder="Relative Name" name="relative_name"
                                value="{{ $patient->relative_name }}" required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="text" class="form-control" placeholder="Relative Phone" name="relative_phone"
                                value="{{ $patient->relative_phone }}" required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="text" class="form-control" placeholder="Country" name="country"
                                value="{{ $patient->country }}" required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="text" class="form-control" placeholder="State" name="state"
                                value="{{ $patient->state }}" required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="text" class="form-control" placeholder="District" name="district"
                                value="{{ $patient->district }}" required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="text" class="form-control" placeholder="Location" name="location"
                                value="{{ $patient->location }}" required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="text" class="form-control" placeholder="Occupation" name="occupation"
                                value="{{ $patient->occupation }}" required />
                        </div>
                        <div class="col-md-12 mb-3">
                            <textarea class="form-control" placeholder="Description" name="description"
                                required>{{ $patient->description }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary waves-effect">
                            Update
                        </button>
                        <a href="{{ route('admin.patient.show', $patient->id) }}" class="btn btn-danger waves-effect">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection