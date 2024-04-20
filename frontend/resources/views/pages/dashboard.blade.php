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
    <div class="container">
        <div class="flex flex-wrap justify-evenly gap-8">
            <div class="card w-auto count-card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-center">
                        <i class="fas fa-users fa-3x text-primary mr-3"></i>
                        <div>
                            <h2 class="card-title text-bold">EMPLOYEES</h2>
                            <p class="card-text">{{ $employeeCount }} Records(s)</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card w-auto count-card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-center">
                        <i class="fas fa-users fa-3x text-success mr-3"></i>
                        <div>
                            <h2 class="card-title text-bold">CUSTOMERS</h2>
                            <p class="card-text">{{ $customerCount }} Records(s)</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card w-auto count-card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-center">
                        <i class="fas fa-truck-field fa-3x text-danger mr-3"></i>
                        <div>
                            <h2 class="card-title text-bold">SUPPLIERS</h2>
                            <p class="card-text">{{ $supplierCount }} Records(s)</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card w-auto count-card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-center">
                        <i class="fas fa-boxes-packing fa-3x text-warning mr-3"></i>
                        <div>
                            <h2 class="card-title text-bold">PRODUCTS</h2>
                            <p class="card-text">{{ $productCount }} Records(s)</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card w-auto count-card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-center">
                        <i class="fas fa-book fa-3x text-secondary mr-3"></i>
                        <div>
                            <h2 class="card-title text-bold">INVOICES</h2>
                            <p class="card-text">{{ $invoiceCount }} Records(s)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card mt-12">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h2 class="text-bold my-4">Recently Added Products</h2>
                </div>

                <div class="list-group">
                    @foreach ($recentProducts as $product)
                        <a href="#"
                           class="list-group-item list-group-item-action">{{ $product->name }}</a>
                    @endforeach
                </div>
            </div>

        </div>

    </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#statusMessage').delay(5000).fadeOut();
            $('#successMessage').delay(5000).fadeOut();
            $('#errorMessage').delay(5000).fadeOut();
        });
    </script>
@endsection
