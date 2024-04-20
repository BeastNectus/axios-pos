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
                <h5 class="card-title text-bold">Customers</h5>
                <button class="btn btn-success text-white"
                        data-bs-toggle="modal"
                        data-bs-target="#addModal">+</button>
            </div>
            <table class="table-bordered table"
                   id="customerTable"
                   style="width: 100%">
                <thead>
                    <tr>
                        <th class="text-left align-middle">First Name</th>
                        <th class="text-left align-middle">Last Name</th>
                        <th class="text-left align-middle">Contact Number</th>
                        <th class="text-left align-middle">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $index => $customer)
                        <tr>
                            <td class="text-left align-middle">{{ $customer->first_name }}</td>
                            <td class="text-left align-middle">{{ $customer->last_name }}</td>
                            <td class="text-left align-middle">{{ $customer->contact_number }}</td>
                            <td class="d-flex justify-content-center gap-5">
                                <button class="btn btn-primary edit-btn"
                                        data-index="{{ $index }}"
                                        data-customer-id="{{ $customer->id }}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $index }}">
                                    <i class="fas fa-edit"></i> EDIT
                                </button>
                                <button class="btn btn-danger delete-btn"
                                        data-customer-id="{{ $customer->id }}">
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
                                        <h5 class="modal-title">Customer Details</h5>
                                        <button type="button"
                                                class="close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="editCustomerForm{{ $index }}"
                                              class="edit-customer-form"
                                              action="{{ route('updateCustomer') }}"
                                              method="POST">
                                            @csrf
                                            <input type="hidden"
                                                   name="customer_id"
                                                   value="{{ $customer->id }}">
                                            <div class="form-group row text-left">
                                                <div class="col-sm-3 text-primary d-flex align-items-center">
                                                    <h5 class="text-black">First Name</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text"
                                                           class="form-control"
                                                           id="editFirstName{{ $index }}"
                                                           name="first_name"
                                                           placeholder="first name"
                                                           value="{{ $customer->first_name }}">
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
                                                           placeholder="last name"
                                                           value="{{ $customer->last_name }}">
                                                </div>
                                            </div>
                                            <div class="form-group row text-left">
                                                <div class="col-sm-3 text-primary d-flex align-items-center">
                                                    <h5 class="text-black">Contact</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text"
                                                           class="form-control"
                                                           id="editContact{{ $index }}"
                                                           name="contact_number"
                                                           placeholder="ex. 09123456789"
                                                           value="{{ $customer->contact_number }}">
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
                    <h5 class="modal-title">Add Customer</h5>
                    <button type="button"
                            class="close"
                            data-bs-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addCustomerForm"
                          action="{{ route('createCustomer') }}"
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
            $('#customerTable').DataTable();

            $(document).on('click', '.delete-btn', function() {
                var customerId = $(this).data('customer-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You will not be able to recover this customer!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('deleteCustomer') }}',
                            type: 'POST',
                            data: {
                                customer_id: customerId,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    'Customer has been deleted.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                                Swal.fire(
                                    'Error!',
                                    'An error occurred while deleting the customer.',
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
                var contact = $('#editContact' + index).val();
                $('#editFirstName').val(firstName);
                $('#editLastName').val(lastName);
                $('#editContact').val(contact);
            });

            $('#statusMessage').delay(5000).fadeOut();
            $('#successMessage').delay(5000).fadeOut();
            $('#errorMessage').delay(5000).fadeOut();
        });
    </script>
@endsection
