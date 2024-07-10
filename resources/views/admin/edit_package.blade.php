@extends('admin.admin.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="border-bottom title-part-padding">
                <h4 class="card-title mb-0">Edit Package</h4>
            </div>
            <div class="card-body">
                <!-- Alert Messages -->
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <form class="form-horizontal form-material" action="{{ route('admin.package.update', $package->id) }}"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="col-md-12 mb-3">
                            <input type="text" class="form-control" name="package_name"
                                value="{{ $package->package_name }}" placeholder="Package Name" required />
                            @error('package_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <textarea class="form-control" name="description" placeholder="Description"
                                required>{{ $package->description }}</textarea>
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- <div class="col-md-12 mb-3">
                            <select class="form-select @error('test_id') is-invalid @enderror" name="test_id[]"
                                id="test_id" multiple required>
                                <option value="" disabled>Select Test</option>
                                @foreach($tests as $test)
                                <option value="{{ $test->id }}" {{ in_array($test->id,
                                    $package->tests->pluck('id')->toArray()) ? 'selected' : '' }}>
                                    {{ $test->test_name }}
                                </option>
                                @endforeach
                            </select>
                            @error('test_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}






                        
                        <div class="col-md-12 mb-3">
                            <select class="form-select" name="test_id" required>
                                <option value="">Select Test</option>
                                @foreach($tests as $test)
                                <option value="{{ $test->id }}">{{ $test->test_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="number" class="form-control" name="price" value="{{ $package->price }}"
                                placeholder="Price" required />
                            @error('price')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info waves-effect">Update</button>
                        <a href="{{ route('admin.package.show') }}" class="btn btn-danger waves-effect">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection