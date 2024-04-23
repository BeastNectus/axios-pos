@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-info"
             id="statusMessage">
            {{ session('status') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success"
             id="successMessage">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger"
             id="errorMessage">
            {{ session('error') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="mb-2 flex items-center gap-5">
                <h5 class="card-title text-bold">Employees</h5>
                <button class="btn btn-success text-white"
                        data-bs-toggle="modal"
                        data-bs-target="#addModal">+</button>
            </div>
            <table class="table-bordered table nowrap"
                   id="employeeTable"
                   style="width: 100%">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Gender</th>
                        <th>Hired</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $index => $employee)
                        <tr>
                            <td>{{ $employee->first_name }}</td>
                            <td>{{ $employee->last_name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->contact_number }}</td>
                            <td>{{ $employee->gender }}</td>
                            <td>{{ $employee->hired_date }}</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary btn-sm edit-btn"
                                        data-index="{{ $index }}"
                                        data-employee-id="{{ $employee->id }}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $index }}">
                                    <i class="fas fa-edit"></i> EDIT
                                </button>
                                <button class="btn btn-sm btn-danger btn-sm delete-btn"
                                        data-employee-id="{{ $employee->id }}">
                                    <i class="fas fa-trash"></i> DELETE
                                </button>
                            </td>
                        </tr>
                        <!-- EDIT MODAL -->
                        <div class="modal fade edit-modal"
                             id="editModal{{ $index }}"
                             tabindex="-1"
                             role="dialog"
                             data-index="{{ $index }}"
                             aria-labelledby="editModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog"
                                 role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Employee</h5>
                                        <button type="button"
                                                class="close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="editEmployeeForm{{ $index }}"
                                              class="edit-employee-form"
                                              action="{{ route('updateEmployee') }}"
                                              method="POST">
                                            @csrf
                                            <input type="hidden"
                                                   name="employee_id"
                                                   value="{{ $employee->id }}">
                                            <div class="form-group">
                                                <label for="edit_first_name">First Name</label>
                                                <input type="text"
                                                       class="form-control"
                                                       id="edit_first_name{{ $index }}"
                                                       name="first_name"
                                                       placeholder="First Name"
                                                       value="{{ $employee->first_name }}"
                                                       required>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_last_name">Last Name</label>
                                                <input type="text"
                                                       class="form-control"
                                                       id="edit_last_name{{ $index }}"
                                                       name="last_name"
                                                       placeholder="Last Name"
                                                       value="{{ $employee->last_name }}"
                                                       required>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_email">Email</label>
                                                <input type="email"
                                                       class="form-control"
                                                       id="edit_email{{ $index }}"
                                                       name="email"
                                                       placeholder="Email"
                                                       value="{{ $employee->email }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_gender">Gender</label>
                                                <select class="form-control"
                                                        id="edit_gender{{ $index }}"
                                                        name="gender"
                                                        required>
                                                    <option value="Male"
                                                            {{ $employee->gender == 'Male' ? 'selected' : '' }}>Male
                                                    </option>
                                                    <option value="Female"
                                                            {{ $employee->gender == 'Female' ? 'selected' : '' }}>
                                                        Female
                                                    </option>
                                                    <option value="Other"
                                                            {{ $employee->gender == 'Other' ? 'selected' : '' }}>Other
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_hired_date">Hired Date</label>
                                                <input type="date"
                                                       class="form-control"
                                                       id="edit_hired_date{{ $index }}"
                                                       name="hired_date"
                                                       value="{{ date('Y-m-d', strtotime($employee->hired_date)) }}"
                                                       required>
                                            </div>
                                            <div class="form-group">
                                                <label for="edit_contact_number">Contact Number</label>
                                                <input type="text"
                                                       class="form-control"
                                                       id="edit_contact_number{{ $index }}"
                                                       name="contact_number"
                                                       placeholder="Contact Number"
                                                       value="{{ $employee->contact_number }}"
                                                       required>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button"
                                                        class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                <button type="submit"
                                                        class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END MODAL -->
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- ADD MODAL -->
    <div class="modal fade"
         id="addModal"
         tabindex="-1"
         role="dialog"
         aria-labelledby="addModalLabel"
         aria-hidden="true">
        <div class="modal-dialog"
             role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Employee</h5>
                    <button type="button"
                            class="close"
                            data-bs-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addEmployeeForm"
                          action="{{ route('createEmployee') }}"
                          method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text"
                                   class="form-control"
                                   id="first_name"
                                   name="first_name"
                                   placeholder="First Name"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text"
                                   class="form-control"
                                   id="last_name"
                                   name="last_name"
                                   placeholder="Last Name"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control"
                                    id="gender"
                                    name="gender"
                                    required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email"
                                   class="form-control"
                                   id="email"
                                   name="email"
                                   placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="hired_date">Hired Date</label>
                            <input type="date"
                                   class="form-control"
                                   id="hired_date"
                                   name="hired_date"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="contact_number">Contact Number</label>
                            <input type="text"
                                   class="form-control"
                                   id="contact_number"
                                   name="contact_number"
                                   placeholder="Contact Number"
                                   required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit"
                                    class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END ADD MODAL -->

    <script>
        $(document).ready(function() {
            $('#employeeTable').DataTable({
                responsive: true
            });
            $('.edit-btn').click(function() {
                var index = $(this).data('index');
                var firstName = $('#editFirstName' + index).val();
                var lastName = $('#editLastName' + index).val();
                var contact = $('#editContact' + index).val();
                $('#editFirstName').val(firstName);
                $('#editLastName').val(lastName);
                $('#editContact').val(contact);
            });

            $('#addModal').on('show.bs.modal', function() {
                $('#location').val('');
                $('#province').empty().append('<option value="">Select Province</option>').prop('disabled',
                    true);
            });

            $('#editModal').on('show.bs.modal', function() {
                $('#edit_location').val('');
                $('#edit_province').empty().append('<option value="">Select Province</option>').prop(
                    'disabled',
                    true);
            });

            $('#location').change(function() {
                var selectedCity = $(this).val();
                $('#province').empty().prop('disabled', true);

                if (selectedCity) {
                    $.ajax({
                        url: '{{ route('getProvincesByCity') }}',
                        type: 'POST',
                        data: {
                            city: selectedCity,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            $('#province').prop('disabled', false);

                            $.each(data, function(key, value) {
                                $('#province').append('<option value="' + value + '">' +
                                    value + '</option>');
                            });
                        }
                    });
                }
            });

            $('.edit-modal').on('show.bs.modal', function() {
                var index = $(this).data('index');
                var $editLocation = $('#edit_location' + index);
                var $editProvince = $('#edit_province' + index);

                $editLocation.change(function() {
                    var selectedCity = $(this).val();
                    $editProvince.empty().prop('disabled', true);

                    if (selectedCity) {
                        $.ajax({
                            url: '{{ route('getProvincesByCity') }}',
                            type: 'POST',
                            data: {
                                city: selectedCity,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(data) {
                                $editProvince.prop('disabled', false).empty();

                                $.each(data, function(key, value) {
                                    if ('{{ $employee->province }}' ===
                                        value) {
                                        $editProvince.append('<option value="' +
                                            value + '" selected>' + value +
                                            '</option>');
                                    } else {
                                        $editProvince.append('<option value="' +
                                            value + '">' + value +
                                            '</option>');
                                    }
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error('Error:', error);
                            }
                        });
                    }
                });


                $editLocation.val('');
                $editProvince.empty().prop('disabled', true);

                $('#editEmployeeForm' + index)[0].reset();
            });

            $(document).on('click', '.delete-btn', function() {
                var employeeId = $(this).data('employee-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You will not be able to recover this employee!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('deleteEmployee') }}',
                            type: 'POST',
                            data: {
                                employee_id: employeeId,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    'Employee has been deleted.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                                Swal.fire(
                                    'Error!',
                                    'An error occurred while deleting the employee.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
            $('#statusMessage').delay(5000).fadeOut();
            $('#successMessage').delay(5000).fadeOut();
            $('#errorMessage').delay(5000).fadeOut();
        });
    </script>
@endsection
