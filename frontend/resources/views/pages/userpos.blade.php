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
                        <a class="nav-link @if ($loop->first) active @endif"
                           id="category-{{ $category->id }}-tab"
                           data-toggle="tab"
                           href="#category-{{ $category->id }}"
                           role="tab"
                           aria-controls="category-{{ $category->id }}"
                           aria-selected="@if ($loop->first) true @else false @endif">{{ $category->category_name }}</a>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content"
                 id="myTabContent">
                @foreach ($categories as $category)
                    <div class="tab-pane fade @if ($loop->first) show active @endif"
                         id="category-{{ $category->id }}"
                         role="tabpanel"
                         aria-labelledby="category-{{ $category->id }}-tab">

                        <table id="dataTable_{{ $category->id }}"
                               class="table-bordered nowrap table"
                               style="width: 100%">
                            <thead>
                                <tr>
                                    <th class="text-left align-middle">Name</th>
                                    <th class="text-left align-middle">Description</th>
                                    <th class="text-left align-middle">Price</th>
                                    <th class="text-left align-middle">Stock</th>
                                    <th class="text-left align-middle">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productsByCategory[$category->id] as $product)
                                    <tr>
                                        <td class="text-left align-middle">{{ $product->name }}</td>
                                        <td class="text-left align-middle">{{ $product->description }}</td>
                                        <td class="text-left align-middle">₱{{ $product->price }}</td>
                                        <td class="text-left align-middle">
                                            @if ($product->qty_stock > 0)
                                                {{ $product->qty_stock }}
                                            @else
                                                Out of Stock
                                            @endif
                                        </td>
                                        <td>
                                            @if ($product->qty_stock > 0)
                                                <button type="button"
                                                        class="btn btn-sm btn-success add-to-cart"
                                                        style="width: 100%"
                                                        data-product-id="{{ $product->id }}"
                                                        data-product-name="{{ $product->name }}"
                                                        data-product-price="{{ $product->price }}"><i
                                                       class="fas fa-plus"></i></button>
                                            @endif
                                        </td>
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
            <div class="table-responsive">


                <table class="table-bordered nowrap table"
                       id="pointOfSaleTable"
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
                        <!-- Cart items will be dynamically added here -->
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"
                                class="text-right align-middle"><strong>Total:</strong></td>
                            <td id="cartTotal"
                                class="text-left align-middle"><strong>₱0.00</strong></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3"
                                class="text-right align-middle"><strong>Cash:</strong></td>
                            <td>
                                <input type="number"
                                       class="form-control"
                                       id="cashInput"
                                       placeholder="Enter cash amount">
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3"
                                class="text-right align-middle"><strong>Customer Change:</strong></td>
                            <td id="customerChange"
                                class="text-left align-middle"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3"
                                class="text-right align-middle"><strong>Customer:</strong></td>
                            <td>
                                <select class="form-control"
                                        id="customerSelect">
                                    <option value="">Select a customer</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->first_name }}
                                            {{ $customer->last_name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="mt-3 text-right">
                <button type="button"
                        class="btn btn-sm btn-primary"
                        id="submitInvoiceBtn">Submit</button>
            </div>

        </div>
    </div>



    <script>
        $(document).ready(function() {
            function initializeActiveTabDataTable() {
                var activeTabId = $('#myTab .nav-link.active').attr('aria-controls').split("-").pop();
                $('#dataTable_' + activeTabId).DataTable({
                    "pageLength": 5,
                    responsive: true
                });
            }
            initializeActiveTabDataTable();

            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                var categoryId = $(e.target).attr("aria-controls").split("-").pop();
                $('#dataTable_' + categoryId).DataTable({
                    "pageLength": 5,
                    responsive: true,
                    "destroy": true
                });
            });

            function updateCartTotal() {
                var total = 0;
                $('#pointOfSaleTable tbody tr').each(function() {
                    var price = parseFloat($(this).find('td:eq(2)').text().replace('₱', '').trim());
                    var quantity = parseInt($(this).find('input[name="quantity"]').val());
                    total += price * quantity;
                });
                $('#cartTotal').text('₱' + total.toFixed(2));
            }

            var isFirstAdd = true;

            $(document).on('click', '.add-to-cart', function() {
                var productId = $(this).data('product-id');
                var productName = $(this).data('product-name');
                var productPrice = $(this).data('product-price');

                var existingRow = $('#pointOfSaleTable tbody tr').filter(function() {
                    return $(this).find('td:eq(0)').text().trim() === productName;
                });

                if (existingRow.length > 0) {
                    var quantityInput = existingRow.find('input[name="quantity"]');
                    var newQuantity = parseInt(quantityInput.val()) + 1;
                    quantityInput.val(newQuantity);

                    var totalPrice = (newQuantity * productPrice).toFixed(2);
                    existingRow.find('.total').text('₱' + totalPrice);
                } else {
                    var newRow = `
                    <tr>
                        <td>${productName}</td>
                        <td><input type="number" class="form-control" name="quantity" value="1"></td>
                        <td>₱${productPrice}</td>
                        <td><span class="total">₱${productPrice}</span></td>
                        <td><button type="button" class="btn btn-danger remove-from-cart" style="width: 100%"><i class="fas fa-trash-alt"></i></button></td>
                    </tr>`;
                    $('#pointOfSaleTable tbody').append(newRow);
                }

                updateCartTotal();

                if (isFirstAdd) {
                    $('html, body').animate({
                        scrollTop: $('#pointOfSaleTable').offset().top
                    }, 500);
                    isFirstAdd = false;
                }
            });

            function updateCustomerChange() {
                var total = parseFloat($('#cartTotal').text().replace('₱', '').trim());
                var cash = parseFloat($('#cashInput').val());
                var customerChange = cash - total;
                $('#customerChange').text('₱' + customerChange.toFixed(2));
            }

            $(document).on('change', '#pointOfSaleTable tbody input[name="quantity"]', function() {
                var quantity = parseInt($(this).val());
                var price = parseFloat($(this).closest('tr').find('td:eq(2)').text().replace('₱', '')
                    .trim());
                var total = (quantity * price).toFixed(2);
                $(this).closest('tr').find('.total').text('₱' + total);
                updateCartTotal();
                updateCustomerChange();
            });

            $(document).on('click', '.remove-from-cart', function() {
                $(this).closest('tr').remove();
                updateCartTotal();

                $('#cashInput').val('');
            });

            $('#myTab a').click(function(e) {
                e.preventDefault();
                $(this).tab('show');
            });

            $('#cashInput').on('input', function() {
                updateCustomerChange();
            });

            $('#cashInput').on('keyup', calculateChange);
            $('#customerSelect').on('change', calculateChange);

            function submitInvoice() {
                var customerId = $('#customerSelect').val();
                var cash = $('#cashInput').val();
                var cartItemCount = $('#pointOfSaleTable tbody tr').length;

                if (!customerId || !cash || cartItemCount === 0) {
                    Swal.fire("Error!",
                        "Please select a customer, enter the cash amount, and add at least one product to the cart.",
                        "error");
                    return;
                }

                Swal.fire({
                    title: "Are you sure?",
                    text: "Once submitted, you will not be able to edit this invoice!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, submit it!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        var invoiceData = [];
                        $('#pointOfSaleTable tbody tr').each(function() {
                            var productName = $(this).find('td:eq(0)').text().trim();
                            var quantity = parseInt($(this).find('input[name="quantity"]').val());
                            var price = parseFloat($(this).find('td:eq(2)').text().replace('₱', '')
                                .trim());
                            var total = parseFloat($(this).find('.total').text().replace('₱', '')
                                .trim());
                            invoiceData.push({
                                product_name: productName,
                                num_of_items: quantity,
                                price: price,
                                total: total
                            });
                        });

                        var cash = parseFloat($('#cashInput').val());

                        var customerId = $('#customerSelect').val();

                        $.ajax({
                            url: '{{ route('createInvoice') }}',
                            type: 'POST',
                            data: {
                                invoice_data: JSON.stringify(invoiceData),
                                cash: cash,
                                customer_id: customerId,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                console.log(
                                    response);
                                if (response.invoice_ids.length > 0) {
                                    var invoiceId = response.invoice_ids[0];

                                    window.location.href = '/invoice-receipt/' +
                                        encodeURIComponent(invoiceId);
                                } else {
                                    alert('No invoice IDs returned in the response');
                                }
                                Swal.fire({
                                    title: "Success!",
                                    text: response.message,
                                    icon: "success",
                                    confirmButtonText: "OK",
                                    allowOutsideClick: false,
                                    onClose: function() {
                                        $('#pointOfSaleTable tbody').empty();
                                        $('#cashInput').val('');
                                        $('#customerSelect').val('');
                                        $('#cartTotal').text('₱0.00');
                                        $('#customerChange').text('');
                                    }
                                });
                                setTimeout(function() {
                                    $('.swal2-confirm')
                                        .click();
                                    location.reload();
                                }, 2000);
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                                Swal.fire("Error!",
                                    "An error occurred while submitting the invoice.",
                                    "error");
                            }
                        });
                    }
                });
            }

            function calculateChange() {
                var cash = parseFloat($('#cashInput').val());
                var total = parseFloat($('#cartTotal').text().replace('₱', ''));

                if (!isNaN(cash) && !isNaN(total)) {
                    var change = cash - total;
                    $('#customerChange').text('₱' + change.toFixed(2));
                } else {
                    $('#customerChange').text('');
                }
            }


            $('#submitInvoiceBtn').click(function() {
                submitInvoice();
            });

            $('#statusMessage, #successMessage, #errorMessage').delay(5000).fadeOut();
        });
    </script>
@endsection
