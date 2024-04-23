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
                <h5 class="card-title text-bold">Products</h5>
                <button class="btn btn-success text-white"
                        data-bs-toggle="modal"
                        data-bs-target="#addModal">+</button>
            </div>
            <table class="table-bordered table nowrap"
                   id="productTable"
                   style="width: 100%">
                <thead>
                    <tr>
                        <th class="text-left align-middle">Product Code</th>
                        <th class="text-left align-middle">Name</th>
                        <th class="text-left align-middle">Price</th>
                        <th class="text-left align-middle">Category</th>
                        <th class="text-left align-middle">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $index => $product)
                        <tr>
                            <td class="text-left align-middle">{{ $product->product_code }}</td>
                            <td class="text-left align-middle">{{ $product->name }}</td>
                            <td class="text-left align-middle">{{ $product->price }}</td>
                            <td class="text-left align-middle">
                                @foreach ($categories as $category)
                                    @if ($category->id == $product->category_id)
                                        {{ $category->category_name }}
                                    @endif
                                @endforeach
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary edit-btn"
                                        data-index="{{ $index }}"
                                        data-product-id="{{ $product->id }}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $index }}">
                                    <i class="fas fa-edit"></i> EDIT
                                </button>
                                <button class="btn btm-sm btn-danger delete-btn"
                                        data-product-id="{{ $product->id }}">
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
                                        <h5 class="modal-title">Product Details</h5>
                                        <button type="button"
                                                class="close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="editProductForm{{ $index }}"
                                              class="edit-product-form"
                                              action="{{ route('updateProduct') }}"
                                              method="POST">
                                            @csrf
                                            <input type="hidden"
                                                   name="product_id"
                                                   value="{{ $product->id }}">
                                            <div class="form-group row text-left">
                                                <div class="col-sm-3 text-primary d-flex align-items-center">
                                                    <h5 class="text-black">Product Code</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text"
                                                           class="form-control"
                                                           id="editProductCode{{ $index }}"
                                                           name="product_code"
                                                           value="{{ $product->product_code }}">
                                                </div>
                                            </div>
                                            <div class="form-group row text-left">
                                                <div class="col-sm-3 text-primary d-flex align-items-center">
                                                    <h5 class="text-black">Product Name</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text"
                                                           class="form-control"
                                                           id="editName{{ $index }}"
                                                           name="name"
                                                           value="{{ $product->name }}">
                                                </div>
                                            </div>
                                            <div class="form-group row text-left">
                                                <div class="col-sm-3 text-primary d-flex align-items-center">
                                                    <h5 class="text-black">Description</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text"
                                                           class="form-control"
                                                           id="editDescription{{ $index }}"
                                                           name="description"
                                                           value="{{ $product->description }}">
                                                </div>
                                            </div>
                                            <div class="form-group row text-left">
                                                <div class="col-sm-3 text-primary d-flex align-items-center">
                                                    <h5 class="text-black">Quantity Stock</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text"
                                                           class="form-control"
                                                           id="editQuantity{{ $index }}"
                                                           name="qty_stock"
                                                           value="{{ $product->qty_stock }}">
                                                </div>
                                            </div>
                                            <div class="form-group row text-left">
                                                <div class="col-sm-3 text-primary d-flex align-items-center">
                                                    <h5 class="text-black">On Hand</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text"
                                                           class="form-control"
                                                           id="editOnHand{{ $index }}"
                                                           name="on_hand"
                                                           value="{{ $product->on_hand }}">
                                                </div>
                                            </div>
                                            <div class="form-group row text-left">
                                                <div class="col-sm-3 text-primary d-flex align-items-center">
                                                    <h5 class="text-black">Product Price</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text"
                                                           class="form-control"
                                                           id="editPrice{{ $index }}"
                                                           name="price"
                                                           value="{{ $product->price }}">
                                                </div>
                                            </div>
                                            <div class="form-group row text-left">
                                                <div class="col-sm-3 text-primary d-flex align-items-center">
                                                    <h5 class="text-black">Category</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <select class="form-control"
                                                            id="editCategory{{ $index }}"
                                                            name="category_id">
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}"
                                                                    {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                                {{ $category->category_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row text-left">
                                                <div class="col-sm-3 text-primary d-flex align-items-center">
                                                    <h5 class="text-black">Supplier</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <select class="form-control"
                                                            id="editSupplier{{ $index }}"
                                                            name="supplier_id"
                                                            required>
                                                        @foreach ($suppliers as $supplier)
                                                            <option value="{{ $supplier->id }}"
                                                                    {{ $product->supplier_id == $supplier->id ? 'selected' : '' }}>
                                                                {{ $supplier->company_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row text-left">
                                                <div class="col-sm-3 text-primary d-flex align-items-center">
                                                    <h5 class="text-black">Supplier</h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="date"
                                                           class="form-control"
                                                           id="editDateStockIn{{ $index }}"
                                                           name="date_stock_in"
                                                           value="{{ date('Y-m-d', strtotime($product->date_stock_in)) }}">
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
                    <h5 class="modal-title">Add Product</h5>
                    <button type="button"
                            class="close"
                            data-bs-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addProductForm"
                          action="{{ route('createProduct') }}"
                          method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="product_code">Product Code</label>
                            <input type="text"
                                   class="form-control"
                                   id="product_code"
                                   name="product_code"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text"
                                   class="form-control"
                                   id="name"
                                   name="name"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text"
                                   class="form-control"
                                   id="description"
                                   name="description"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="qty_stock">Quantity</label>
                            <input type="text"
                                   class="form-control"
                                   id="qty_stock"
                                   name="qty_stock"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="on_hand">On Hand</label>
                            <input type="text"
                                   class="form-control"
                                   id="on_hand"
                                   name="on_hand"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text"
                                   class="form-control"
                                   id="price"
                                   name="price"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control"
                                    id="editCategory{{ $index }}"
                                    name="category_id"
                                    required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="supplier_id">Supplier</label>
                            <select class="form-control"
                                    id="editSupplier{{ $index }}"
                                    name="supplier_id"
                                    required>
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}"
                                            {{ $product->supplier_id == $supplier->id ? 'selected' : '' }}>
                                        {{ $supplier->company_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date_stock_in">Date Stock In</label>
                            <input type="date"
                                   class="form-control"
                                   id="date_stock_in"
                                   name="date_stock_in"
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
            $('#productTable').DataTable({
                responsive: true,
                "order": [
                    [1, 'asc']
                ]
            });

            $('.edit-btn').click(function() {
                var index = $(this).data('index');
                var ProductCode = $('#editProductCode' + index).val();
                var Name = $('#editName' + index).val();
                var Description = $('#editDescription' + index).val();
                var QuantityStock = $('#editQuantity' + index).val();
                var OnHand = $('#editOnHand' + index).val();
                var Price = $('#editPrice' + index).val();
                var CategoryId = $('#editCategory' + index).val();
                var SupplierId = $('#editSupplier' + index).val();
                var DateStockIn = $('#editDateStockIn' + index).val();
                $('#editProductCode' + index).val(ProductCode);
                $('#editName' + index).val(Name);
                $('#editDescription' + index).val(Description);
                $('#editQuantity' + index).val(QuantityStock);
                $('#editOnHand' + index).val(OnHand);
                $('#editPrice' + index).val(Price);
                $('#editCategory' + index).val(CategoryId);
                $('#editSupplier' + index).val(SupplierId);
                $('#editDateStockIn' + index).val(DateStockIn);
            });

            $(document).on('click', '.delete-btn', function() {
                var productId = $(this).data('product-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You will not be able to recover this product!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('deleteProduct') }}',
                            type: 'POST',
                            data: {
                                product_id: productId,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    'Product has been deleted.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                                Swal.fire(
                                    'Error!',
                                    'An error occurred while deleting the product.',
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
