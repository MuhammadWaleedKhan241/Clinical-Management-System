@extends('admin.admin.master')

@section('content')
<div class="container mt-5">
    <div class="card">
        <br><br><br>
        <div class="card-header">
            <h4 class="card-title">Admin Profile</h4>
        </div>
        <div class="card-body">
            <div class="form-group mb-3">
                <label for="adminName">Name:</label>
                <input type="text" id="adminName" class="form-control" value="{{ $admin->name }}" readonly>
            </div>
            <div class="form-group mb-3">
                <label for="adminEmail">Email:</label>
                <input type="email" id="adminEmail" class="form-control" value="{{ $admin->email }}" readonly>
            </div>

            <div class="form-group mb-3">
                <label for="adminCreatedAt">Account Created At:</label>
                <input type="text" id="adminCreatedAt" class="form-control" value="{{ $admin->created_at }}" readonly>
            </div>
        </div>
    </div>
</div>
@endsection