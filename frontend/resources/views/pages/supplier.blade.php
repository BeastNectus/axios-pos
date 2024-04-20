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
                <h5 class="card-title text-bold">Suppliers</h5>
                <button class="btn btn-success text-white"
                        data-bs-toggle="modal"
                        data-bs-target="#addModal">+</button>
            </div>
            <div class="table-responsive">
                <table class="table-bordered table"
                       id="supplierTable"
                       style="width: 100%">
                    <thead>
                        <tr>
                            <th class="text-nowrap text-left align-middle">Company Name</th>
                            <th class="text-left align-middle">Contact</th>
                            <th class="text-left align-middle">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suppliers as $index => $supplier)
                            <tr>
                                <td class="text-left align-middle">{{ $supplier->company_name }}</td>
                                <td class="text-left align-middle">{{ $supplier->contact_number }}</td>
                                <td class="d-flex justify-content-center gap-5">
                                    <button class="btn btn-primary edit-btn"
                                            data-index="{{ $index }}"
                                            data-supplier-id="{{ $supplier->id }}"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $index }}">
                                        <i class="fas fa-edit"></i> EDIT
                                    </button>
                                    <button class="btn btn-danger delete-btn"
                                            data-supplier-id="{{ $supplier->id }}">
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
                                            <h5 class="modal-title">Edit Supplier</h5>
                                            <button type="button"
                                                    class="close"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="editSupplierForm{{ $index }}"
                                                  class="edit-supplier-form"
                                                  action="{{ route('updateSupplier') }}"
                                                  method="POST">
                                                @csrf
                                                <input type="hidden"
                                                       name="supplier_id"
                                                       value="{{ $supplier->id }}">
                                                <div class="form-group">
                                                    <label for="edit_company_name">Company Name</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           id="edit_company_name{{ $index }}"
                                                           name="company_name"
                                                           value="{{ $supplier->company_name }}"
                                                           required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="edit_contact_number">Contact Number</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           id="edit_contact_number{{ $index }}"
                                                           name="contact_number"
                                                           placeholder="Contact Number"
                                                           value="{{ $supplier->contact_number }}"
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
                    <h5 class="modal-title">Add Supplier</h5>
                    <button type="button"
                            class="close"
                            data-bs-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addSupplierForm"
                          action="{{ route('createSupplier') }}"
                          method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="company_name">Company Name</label>
                            <input type="text"
                                   class="form-control"
                                   id="company_name"
                                   name="company_name"
                                   required>
                        </div>
                        <input type="hidden"
                               id="location_id"
                               name="location_id">
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
            $('#supplierTable').DataTable();
            $('.edit-btn').click(function() {
                var index = $(this).data('index');
                var companyName = $('#editCompanyName' + index).val();
                var locationId = $('#editLocationId' + index).val();
                var contact = $('#editContact' + index).val();
                $('#editCompanyName').val(companyName);
                $('#editLocationId').val(locationId);
                $('#editContact').val(contact);
            });

            $('#addModal').on('show.bs.modal', function() {
                $('#city').val('');
                $('#province').empty().append('<option value="">Select Province</option>').prop('disabled',
                    true);
            });

            $('#editModal').on('show.bs.modal', function() {
                $('#edit_location').val('');
                $('#edit_province').empty().append('<option value="">Select Province</option>').prop(
                    'disabled',
                    true);
            });


            $('.delete-btn').click(function() {
                var supplierId = $(this).data('supplier-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You will not be able to recover this supplier!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('deleteSupplier') }}',
                            type: 'POST',
                            data: {
                                supplier_id: supplierId,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    'Supplier has been deleted.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                                Swal.fire(
                                    'Error!',
                                    'An error occurred while deleting the supplier.',
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
