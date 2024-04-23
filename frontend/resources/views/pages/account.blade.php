@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="mb-2 flex items-center gap-5">
                <h5 class="card-title text-bold">Manager</h5>
                <button class="btn btn-success text-white"
                        data-bs-toggle="modal"
                        data-bs-target="#addModal">+</button>
            </div>
            <table class="table-bordered table nowrap"
                   id="managerTable"
                   style="width: 100%">
                <thead>
                    <tr>
                        <th class="text-left align-middle">Email</th>
                        <th class="text-left align-middle">User Type</th>
                        <th class="text-left align-middle">Associated Person</th>
                        <th class="text-left align-middle">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users->where('user_type', 2) as $index => $user)
                        @php
                            $employee = $employees->where('id', $user->employee_id)->first();
                        @endphp
                        <tr>
                            <td class="text-left align-middle">
                                {{ $user->email }}
                            </td>
                            <td class="text-left align-middle">
                                @foreach ($user_types as $user_type)
                                    @if ($user_type->id == $user->user_type)
                                        {{ $user_type->name }}
                                    @endif
                                @endforeach
                            </td>
                            <td class="text-left align-middle">
                                @if ($employee)
                                    {{ $employee->first_name }}
                                    {{ $employee->last_name }}
                                @endif
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary edit-btn"
                                        data-index="{{ $index }}"
                                        data-user-id="{{ $user->id }}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $index }}">
                                    <i class="fas fa-edit"></i> EDIT
                                </button>
                                <button class="btn btn-sm btn-danger delete-btn"
                                        data-user-id="{{ $user->id }}">
                                    <i class="fas fa-trash"></i> DELETE
                                </button>
                            </td>
                        </tr>
                        <!-- EDIT MODAL -->
                        <div class="modal fade"
                             id="editModal{{ $index }}"
                             tabindex="-1"
                             role="dialog"
                             aria-labelledby="editModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog"
                                 role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">User Details</h5>
                                        <button type="button"
                                                class="close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="editUserForm{{ $index }}"
                                              class="edit-user-form"
                                              action="{{ route('updateUser') }}"
                                              method="POST">
                                            @csrf
                                            <input type="hidden"
                                                   name="employee_id"
                                                   value="{{ $employee ? $employee->id : '' }}">
                                            <div class="form-group row text-left">
                                                <div class="col-sm-3 text-primary d-flex align-items-center">
                                                    <h5 class="text-black">First Name</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text"
                                                           class="form-control"
                                                           id="editFirstName{{ $index }}"
                                                           name="first_name"
                                                           value="{{ $employee ? $employee->first_name : '' }}">
                                                </div>
                                            </div>
                                            <div class="form-group row text-left">
                                                <div class="col-sm-3 text-primary d-flex align-items-center">
                                                    <h5 class="text-black">Last Name</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text"
                                                           class="form-control"
                                                           id="editLastName{{ $index }}"
                                                           name="last_name"
                                                           value="{{ $employee ? $employee->last_name : '' }}">
                                                </div>
                                            </div>
                                            <div class="form-group row text-left">
                                                <div class="col-sm-3 text-primary d-flex align-items-center">
                                                    <h5 class="text-black">Email</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text"
                                                           class="form-control"
                                                           id="editEmail{{ $index }}"
                                                           name="email"
                                                           value="{{ $user->email }}">
                                                </div>
                                            </div>
                                            <div class="form-group row text-left">
                                                <div class="col-sm-3 text-primary d-flex align-items-center">
                                                    <h5 class="text-black">Password</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="password"
                                                           class="form-control"
                                                           id="editPassword{{ $index }}"
                                                           name="password"
                                                           value=""
                                                           placeholder="Enter a password">
                                                </div>
                                            </div>
                                            <div class="form-group row text-left">
                                                <div class="col-sm-3 text-primary d-flex align-items-center">
                                                    <h5 class="text-black">User Type</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <select class="form-control"
                                                            id="editUserType{{ $index }}"
                                                            name="user_type">
                                                        @foreach ($user_types as $user_type)
                                                            <option value="{{ $user_type->id }}"
                                                                    @if ($user_type->id == $user->user_type) selected @endif>
                                                                {{ $user_type->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button"
                                                        class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                <button type="submit"
                                                        class="btn btn-primary update-btn"
                                                        data-index="{{ $index }}">Update</button>
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

    <div class="card">
        <div class="card-body">
            <div class="mb-2 flex items-center gap-5">
                <h5 class="card-title text-bold">User</h5>
                <button class="btn btn-success text-white"
                        data-bs-toggle="modal"
                        data-bs-target="#addModal">+</button>
            </div>
            <table class="table-bordered table nowrap"
                   id="userTable"
                   style="width: 100%">
                <thead>
                    <tr>
                        <th class="text-left align-middle">Email</th>
                        <th class="text-left align-middle">User Type</th>
                        <th class="text-left align-middle">Associated Person</th>
                        <th class="text-left align-middle">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users->where('user_type', 3) as $index => $user)
                        @php
                            $employee = $employees->where('id', $user->employee_id)->first();
                        @endphp
                        <tr>
                            <td class="text-left align-middle">
                                {{ $user->email }}
                            </td>
                            <td class="text-left align-middle">
                                @foreach ($user_types as $user_type)
                                    @if ($user_type->id == $user->user_type)
                                        {{ $user_type->name }}
                                    @endif
                                @endforeach
                            </td>
                            <td class="text-left align-middle">
                                @if ($employee)
                                    {{ $employee->first_name }}
                                    {{ $employee->last_name }}
                                @endif
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary edit-btn"
                                        data-index="{{ $index }}"
                                        data-user-id="{{ $user->id }}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $index }}">
                                    <i class="fas fa-edit"></i> EDIT
                                </button>
                                <button class="btn btn-sm btn-danger delete-btn"
                                        data-user-id="{{ $user->id }}">
                                    <i class="fas fa-trash"></i> DELETE
                                </button>
                            </td>
                        </tr>
                        <!-- EDIT MODAL -->
                        <div class="modal fade"
                             id="editModal{{ $index }}"
                             tabindex="-1"
                             role="dialog"
                             aria-labelledby="editModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog"
                                 role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">User Details</h5>
                                        <button type="button"
                                                class="close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="editUserForm{{ $index }}"
                                              class="edit-user-form"
                                              action="{{ route('updateUser') }}"
                                              method="POST">
                                            @csrf
                                            <input type="hidden"
                                                   name="employee_id"
                                                   value="{{ $employee ? $employee->id : '' }}">
                                            <div class="form-group row text-left">
                                                <div class="col-sm-3 text-primary d-flex align-items-center">
                                                    <h5 class="text-black">First Name</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text"
                                                           class="form-control"
                                                           id="editFirstName{{ $index }}"
                                                           name="first_name"
                                                           value="{{ $employee ? $employee->first_name : '' }}">
                                                </div>
                                            </div>
                                            <div class="form-group row text-left">
                                                <div class="col-sm-3 text-primary d-flex align-items-center">
                                                    <h5 class="text-black">Last Name</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text"
                                                           class="form-control"
                                                           id="editLastName{{ $index }}"
                                                           name="last_name"
                                                           value="{{ $employee ? $employee->last_name : '' }}">
                                                </div>
                                            </div>
                                            <div class="form-group row text-left">
                                                <div class="col-sm-3 text-primary d-flex align-items-center">
                                                    <h5 class="text-black">Email</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text"
                                                           class="form-control"
                                                           id="editEmail{{ $index }}"
                                                           name="email"
                                                           value="{{ $user->email }}">
                                                </div>
                                            </div>
                                            <div class="form-group row text-left">
                                                <div class="col-sm-3 text-primary d-flex align-items-center">
                                                    <h5 class="text-black">Password</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="password"
                                                           class="form-control"
                                                           id="editPassword{{ $index }}"
                                                           name="password"
                                                           value=""
                                                           placeholder="Enter a password">
                                                </div>
                                            </div>
                                            <div class="form-group row text-left">
                                                <div class="col-sm-3 text-primary d-flex align-items-center">
                                                    <h5 class="text-black">User Type</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <select class="form-control"
                                                            id="editUserType{{ $index }}"
                                                            name="user_type">
                                                        @foreach ($user_types as $user_type)
                                                            <option value="{{ $user_type->id }}"
                                                                    @if ($user_type->id == $user->user_type) selected @endif>
                                                                {{ $user_type->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button"
                                                        class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                <button type="submit"
                                                        class="btn btn-primary update-btn"
                                                        data-index="{{ $index }}">Update</button>
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
                    <h5 class="modal-title">Add User</h5>
                    <button type="button"
                            class="close"
                            data-bs-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm"
                          action="{{ route('createUser') }}"
                          method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="employee_id">Employee</label>
                            <select class="form-control"
                                    id="employee_id"
                                    name="employee_id"
                                    required>
                                <option value="">Select Employee</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->first_name }}
                                        {{ $employee->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="user_type">User Type</label>
                            <select class="form-control"
                                    id="user_type"
                                    name="user_type"
                                    required>
                                <option value="">Select User Type</option>
                                @foreach ($user_types as $user_type)
                                    <option value="{{ $user_type->id }}">{{ $user_type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text"
                                   class="form-control"
                                   id="email"
                                   name="email"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password"
                                   class="form-control"
                                   id="password"
                                   name="password"
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
            $('#userTable').DataTable({
                responsive: true
            });
            $('#managerTable').DataTable({
                responsive: true
            });

            $(document).on('click', '.delete-btn', function() {
                var userId = $(this).data('user-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You will not be able to recover this user!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('deleteUser') }}',
                            type: 'POST',
                            data: {
                                user_id: userId,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    'User has been deleted.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                                Swal.fire(
                                    'Error!',
                                    'An error occurred while deleting the user.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });

            $('.edit-btn').click(function() {
                var index = $(this).data('index');
                var firstName = $('#editFirstName' + index).val();
                var lastName = $('#editLastName' + index).val();
                var email = $('#editEmail' + index).val();
                var password = $('#editPassword' + index).val();
                var userType = $('#editUserType' + index).val();
                $('#editFirstName' + index).val(firstName);
                $('#editLastName' + index).val(lastName);
                $('#editEmail' + index).val(email);
                $('#editPassword' + index).val(password);
                $('#editUserType' + index).val(userType);
            });

        });
    </script>
@endsection
