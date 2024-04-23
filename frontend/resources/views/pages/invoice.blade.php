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
                <h5 class="card-title text-bold">Invoices</h5>
            </div>

            <table class="table table-bordered nowrap"
                   id="invoiceTable"
                   style="width: 100%">
                <thead>
                    <tr>
                        <th class="text-left align-middle">Invoice ID</th>
                        <th class="text-left align-middle">Customer</th>
                        <th class="text-left align-middle">Product Name</th>
                        <th class="text-left align-middle">Quantity</th>
                        <th class="text-left align-middle">Price</th>
                        <th class="text-left align-middle">Total</th>
                        <th class="text-left align-middle">Cash</th>
                        <th class="text-left align-middle">Date</th>
                        <th class="text-left align-middle">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoices as $index => $invoice)
                        <tr>
                            <td class="text-left align-middle">{{ $invoice->invoice_id }}</td>
                            <td class="text-left align-middle">{{ $invoice->customer_id }}</td>
                            <td class="text-left align-middle">{{ $invoice->product_name }}</td>
                            <td class="text-left align-middle">{{ $invoice->num_of_items }}</td>
                            <td class="text-left align-middle">₱{{ $invoice->price }}</td>
                            <td class="text-left align-middle">₱{{ $invoice->total }}</td>
                            <td class="text-left align-middle">₱{{ $invoice->cash }}</td>
                            <td class="text-left align-middle">{{ date('Y-m-d', strtotime($invoice->date)) }}</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary edit-btn"
                                        data-index="{{ $index }}"
                                        data-invoice-id="{{ $invoice->invoice_id }}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $index }}">
                                    <i class="fas fa-edit"></i> EDIT
                                </button>
                                <button class="btn btn-sm btn-danger delete-btn"
                                        data-invoice-id="{{ $invoice->invoice_id }}">
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
                                        <h5 class="modal-title">Invoice Details</h5>
                                        <button type="button"
                                                class="close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="editInvoiceForm{{ $index }}"
                                              class="edit-invoice-form"
                                              action="{{ route('updateInvoice') }}"
                                              method="POST">
                                            @csrf
                                            <input type="hidden"
                                                   name="invoice_id"
                                                   value="{{ $invoice->invoice_id }}">
                                            <div class="form-group row text-left">
                                                <div class="col-sm-3 text-primary d-flex align-items-center">
                                                    <h5 class="text-black">Customer</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text"
                                                           class="form-control"
                                                           id="editCustomerId{{ $index }}"
                                                           name="customer_id"
                                                           value="{{ $invoice->customer_id }}">
                                                </div>
                                            </div>
                                            <div class="form-group row text-left">
                                                <div class="col-sm-3 text-primary d-flex align-items-center">
                                                    <h5 class="text-black">Product Name</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text"
                                                           class="form-control"
                                                           id="editProductName{{ $index }}"
                                                           name="product_name"
                                                           value="{{ $invoice->product_name }}">
                                                </div>
                                            </div>
                                            <div class="form-group row text-left">
                                                <div class="col-sm-3 text-primary d-flex align-items-center">
                                                    <h5 class="text-black">Quantity</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text"
                                                           class="form-control"
                                                           id="editNumOfItems{{ $index }}"
                                                           name="num_of_items"
                                                           value="{{ $invoice->num_of_items }}">
                                                </div>
                                            </div>
                                            <div class="form-group row text-left">
                                                <div class="col-sm-3 text-primary d-flex align-items-center">
                                                    <h5 class="text-black">Price</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text"
                                                           class="form-control"
                                                           id="editPrice{{ $index }}"
                                                           name="price"
                                                           value="{{ $invoice->price }}">
                                                </div>
                                            </div>
                                            <div class="form-group row text-left">
                                                <div class="col-sm-3 text-primary d-flex align-items-center">
                                                    <h5 class="text-black">Total</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text"
                                                           class="form-control"
                                                           id="editTotal{{ $index }}"
                                                           name="total"
                                                           value="{{ $invoice->total }}">
                                                </div>
                                            </div>
                                            <div class="form-group row text-left">
                                                <div class="col-sm-3 text-primary d-flex align-items-center">
                                                    <h5 class="text-black">Cash</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text"
                                                           class="form-control"
                                                           id="editQuantity{{ $index }}"
                                                           name="cash"
                                                           value="{{ $invoice->cash }}">
                                                </div>
                                            </div>
                                            <div class="form-group row text-left">
                                                <div class="col-sm-3 text-primary d-flex align-items-center">
                                                    <h5 class="text-black">Date</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="date"
                                                           class="form-control"
                                                           id="editDate{{ $index }}"
                                                           name="date"
                                                           value="{{ date('Y-m-d', strtotime($invoice->date)) }}"
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
    <script>
        $(document).ready(function() {
            $('#invoiceTable').DataTable({
                responsive: true
            });


            $(document).on('click', '.delete-btn', function() {
                var invoiceId = $(this).data('invoice-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You will not be able to recover this invoice!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('deleteInvoice') }}',
                            type: 'POST',
                            data: {
                                invoice_id: invoiceId,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    'Invoice has been deleted.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                                Swal.fire(
                                    'Error!',
                                    'An error occurred while deleting the invoice.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });

            $('.edit-btn').click(function() {
                var index = $(this).data('index');
                var customerId = $('#editCustomerId' + index).val();
                var productName = $('#editProductName' + index).val();
                var num_of_items = $('#editNumOfItems' + index).val();
                var price = $('#editPrice' + index).val();
                var total = $('#editTotal' + index).val();
                var cash = $('#editCash' + index).val();
                var date = $('#editDate' + index).val();
                $('#editCustomerId').val(customerId);
                $('#editProductName').val(productName);
                $('#editNumOfItems').val(num_of_items);
                $('#editPrice').val(price);
                $('#editTotal').val(total);
                $('#editCash').val(cash);
                $('#editDate').val(date);
            });

            $('#statusMessage').delay(5000).fadeOut();
            $('#successMessage').delay(5000).fadeOut();
            $('#errorMessage').delay(5000).fadeOut();
        });
    </script>
@endsection
