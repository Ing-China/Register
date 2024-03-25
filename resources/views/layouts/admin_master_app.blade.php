<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @yield('title', 'Welcome to system')
    </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('asset-admin') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('asset-admin') }}/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @stack('styles')
</head>

<body class="hold-transition sidebar-mini">
    {{-- <div class="wrapper">
        @include('layouts.partials.navbar')

        @include('layouts.partials.sidebar')

        <div class="content-wrapper">
            @stack('page_header')


            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
        </div>
        </section>
    </div> --}}

    {{-- @yield('content') --}}

    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.partials.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @stack('page_header')
            {{-- <section class="content-header"> </section> --}}
            <!-- Main content -->

            <section class="content">
                <div class="container-fluid">
                    <!-- /.card -->
                    @yield('content')
                    <!-- /.content -->
                </div>
        </div>
        </section>
    </div>



    <!-- jQuery -->
    <script src="{{ asset('asset-admin') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('asset-admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('asset-admin') }}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ asset('asset-admin') }}/dist/js/demo.js"></script> --}}
    @stack('scripts')
</body>

</html>
