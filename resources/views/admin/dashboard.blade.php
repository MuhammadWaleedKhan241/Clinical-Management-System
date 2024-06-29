@extends('admin.admin.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex align-items-center gap-4 mb-4">
                <div>
                    <a class="fw-semibold fs-5 text-dark">Admin Dashboard</a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- Card Row -->
            <div class="flex flex-wrap gap-4">
                <div class="card border-0 zoom-in bg-light-primary shadow-none ">
                    <div class="card-body">
                        <div class="text-center">
                            <a class="fw-semibold fs-3 text-primary mb-1">Pending Appointments</a>
                            <h5 class="fw-semibold text-primary mb-0">120</h5>
                        </div>
                    </div>
                </div>
                <div class="card border-0 zoom-in bg-light-warning shadow-none ">
                    <div class="card-body">
                        <div class="text-center">
                            <a class="fw-semibold fs-3 text-primary mb-1">Total Patients</a>
                            <h5 class="fw-semibold text-primary mb-0">120</h5>
                        </div>
                    </div>
                </div>
                <div class="card border-0 zoom-in bg-light-primary shadow-none ">
                    <div class="card-body">
                        <div class="text-center">
                            <a class="fw-semibold fs-3 text-primary mb-1">Total Departments</a>
                            <h5 class="fw-semibold text-primary mb-0">120</h5>
                        </div>
                    </div>
                </div>
                <div class="card border-0 zoom-in bg-light-warning shadow-none ">
                    <div class="card-body">
                        <div class="text-center">
                            <a class="fw-semibold fs-3 text-primary mb-1">Total Test</a>
                            <h5 class="fw-semibold text-primary mb-0">120</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <h3 class="fw-semibold fs-4 text-dark">Appointments</h3>
            <br>
            <input type="text" id="search" class=" form-control w-25 mb-4" placeholder="Search by name">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Patient Name</th>
                                <th>Doctor</th>
                                <th>Description</th>
                                <th>Appointment Date</th>
                                <th>Appointment Time</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->id }}</td>
                                <td>{{ $appointment->patient_name }}</td>
                                <td>{{ $appointment->doctor }}</td>
                                <td>{{ $appointment->description }}</td>
                                <td>{{ $appointment->appointment_date }}</td>
                                <td>{{ $appointment->appointment_time }}</td>
                                <td>{{ $appointment->status }}</td>
                                <td>
                                    <a href="{{ route('admin.appointment.edit', $appointment->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.appointment.destroy', $appointment->id) }}"
                                        method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Pagination -->
            <div class="pagination" id="pagination">
                <!-- Dynamic pagination links will be inserted here -->
            </div>
        </div>

        <div>
            <h3 class="fw-semibold fs-4 text-dark">Collections</h3>
            <br>
            <input type="text" id="search" class=" form-control w-25 mb-4" placeholder="Search by name">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Invoice No </th>
                        <th scope="col">Payment</th>
                        <th scope="col">SubTotal</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Tax</th>
                        <th scope="col">Total Amount</th>
                    </tr>
                </thead>
                <tbody id="userTableBody">
                    <!-- Dynamic rows will be inserted here -->
                </tbody>
            </table>
            <div class="pagination" id="pagination">
                <!-- Dynamic pagination links will be inserted here -->
            </div>
        </div>

        <div>
            <h3 class="fw-semibold fs-4 text-dark">OPD</h3>
            <br>
            <input type="text" id="search" class=" form-control w-25 mb-4" placeholder="Search by name">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Patient</th>
                        <th scope="col">Doctor</th>
                        <th scope="col">Registerd At</th>
                        <th scope="col">Staus</th>
                    </tr>
                </thead>
                <tbody id="userTableBody">
                    <!-- Dynamic rows will be inserted here -->
                </tbody>
            </table>
            <div class="pagination" id="pagination">
                <!-- Dynamic pagination links will be inserted here -->
            </div>
        </div>
    </div>
</div>
@endsection

@push('page-level-script')
<script>
    const users = [
            { id: 1, first: 'Mark', last: 'Otto', handle: '@mdo' },
            { id: 2, first: 'Jacob', last: 'Thornton', handle: '@fat' },
            { id: 3, first: 'Larry', last: 'Bird', handle: '@twitter' },
            { id: 4, first: 'Mark', last: 'Otto', handle: '@mdo' },
            { id: 5, first: 'Jacob', last: 'Thornton', handle: '@fat' },
            { id: 6, first: 'Larry', last: 'Bird', handle: '@twitter' },
            // Add more users as needed
        ];

        const rowsPerPage = 5;
        let currentPage = 1;

        function displayTable(data) {
            const tableBody = $('#userTableBody');
            tableBody.empty();
            data.forEach(user => {
                tableBody.append(`
                <tr>
                    <th scope="row">${user.id}</th>
                    <td>${user.first}</td>
                    <td>${user.last}</td>
                    <td>${user.handle}</td>
                </tr>
            `);
            });
        }

        function displayPagination(totalRows, rowsPerPage) {
            const pagination = $('#pagination');
            pagination.empty();
            const totalPages = Math.ceil(totalRows / rowsPerPage);
            for (let i = 1; i <= totalPages; i++) {
                pagination.append(`<a href="#" class="${i === currentPage ? 'active' : ''}" data-page="${i}">${i}</a>`);
            }
        }

        function paginate(data, page, rowsPerPage) {
            const start = (page - 1) * rowsPerPage;
            const end = start + rowsPerPage;
            return data.slice(start, end);
        }

        function filterData(query, data) {
            return data.filter(user => user.first.toLowerCase().includes(query.toLowerCase()) || user.handle.toLowerCase().includes(query.toLowerCase()));
        }

        function updateTable() {
            const query = $('#search').val();
            const filteredData = filterData(query, users);
            const paginatedData = paginate(filteredData, currentPage, rowsPerPage);
            displayTable(paginatedData);
            displayPagination(filteredData.length, rowsPerPage);
        }

        $(document).ready(function () {
            updateTable();

            $('#search').on('input', function () {
                currentPage = 1; // Reset to first page on search
                updateTable();
            });

            $('#pagination').on('click', 'a', function (event) {
                event.preventDefault();
                currentPage = parseInt($(this).data('page'));
                updateTable();
            });
        });
</script>
@endpush