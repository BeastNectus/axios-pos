<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{asset('images/axios.png')}}" type="image/png">

        <title>Axios - Point of Sale</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        
        <!-- Scripts -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> --}}
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.dataTables.css">
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.0-alpha/js/adminlte.min.js"></script>
        {{-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> --}}
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> --}}
        <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
        <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
        <script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.dataTables.js"></script>
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"/> --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        @vite('resources/css/app.css')
        
       
    </head>
    <body class="font-sans antialiased hold-transition sidebar-mini">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <div class="wrapper">
                @include('layouts.nav')
                @include('layouts.sidebar')
                <div class="content-wrapper p-5 custom-dark">
                    <section class="content">
                        @yield('content')
                    </section>
                </div>
            </div>
        </div>
    </body>
</html>
