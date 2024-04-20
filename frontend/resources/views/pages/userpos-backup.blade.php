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
                <h5 class="card-title text-bold">PRODUCT CATEGORY</h5>
            </div>
            <ul class="nav nav-tabs"
                id="myTab"
                role="tablist">
                @foreach ($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link"
                           id="category-{{ $category->id }}-tab"
                           data-toggle="tab"
                           href="#category-{{ $category->id }}"
                           role="tab"
                           aria-controls="category-{{ $category->id }}"
                           aria-selected="false">{{ $category->category_name }}</a>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content"
                 id="myTabContent">
                @foreach ($categories as $category)
                    <div class="tab-pane fade"
                         id="category-{{ $category->id }}"
                         role="tabpanel"
                         aria-labelledby="category-{{ $category->id }}-tab">
                        <table class="table-bordered table"
                               id="">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productsByCategory[$category->id] as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->category_id }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </div>



    <div class="card">
        <div class="card-body">
            <div class="mb-2 flex items-center gap-5">
                <h5 class="card-title text-bold">POINT OF SALE</h5>
            </div>
            <table class="table-bordered table"
                   id="customerTable"
                   style="width: 100%">
                <thead>
                    <tr>
                        <th class="text-left align-middle">Product Name</th>
                        <th class="text-left align-middle">Quantity</th>
                        <th class="text-left align-middle">Price</th>
                        <th class="text-left align-middle">Total</th>
                        <th class="text-left align-middle">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
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

            $('#myTab a').click(function(e) {
                e.preventDefault();
                $(this).tab('show');
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
