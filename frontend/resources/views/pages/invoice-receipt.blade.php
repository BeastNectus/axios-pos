@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white">INVOICE RECEIPT</div>

                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-between flex-wrap">
                            <div>
                                <h5><strong>Invoice Number:</strong> {{ $invoice->invoice_id }}</h5>
                            </div>
                            
                            <div>
                                <p><strong>Total Amount:</strong> ₱{{ $invoice->total }}</p>
                                <p><strong>Cash:</strong> ₱{{ $invoice->cash }}</p>
                                <p><strong>Change:</strong> ₱{{ $invoice->customer_change }}</p>
                            </div>
                        </div>

                        <table class="table table-bordered nowrap" id="invoiceReceiptTable" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $invoices as $inv )
                                <tr>
                                    <td>{{ $inv->product_name }}</td>
                                    <td>{{ $inv->num_of_items }}</td>
                                    <td>₱{{ $inv->price }}</td>
                                    <td>₱{{ $inv->total }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-right mt-3">
                            <a href="{{ route('invoiceReceiptPDF', ['invoice_id' => base64_encode($invoice->invoice_id)]) }}" class="btn btn-primary">Print Receipt</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#invoiceReceiptTable').DataTable({
                responsive: true,
                searching: false,
                paging: false
            });
        });
    </script>
@endsection

@push('styles')
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .card-header {
            background-color: #343a40 !important;
            color: #fff;
        }

        .table-bordered {
            border: 1px solid #000;
        }

        .btn-primary {
            background-color: #007bff !important;
            border-color: #007bff !important;
        }

        @media print {
            .d-print-none {
                display: none !important;
            }
        }
    </style>
@endpush
