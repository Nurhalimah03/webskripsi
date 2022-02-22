<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PUSKESOS | @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template') }}/dist/css/adminlte.min.css">

    <link href="{{ asset('template') }}/dist/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="{{ asset('template') }}/dist/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Style CSS LogIn-->
    <link rel="stylesheet" href="{{ asset('template') }}/dist/css/style.css">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        @include('layout.navbar')

        @include('layout.sidebar')

        <!-- jQuery -->
        <script src="{{ asset('template') }}/plugins/jquery/jquery.min.js"></script>
        <section class="content">
            @yield('content')
        </section>
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.1.0
            </div>
            <strong>Copyright &copy; 2021 PUSKESOS DINSOS KOTA BANDUNG<a href="https://adminlte.io"> Supported by:
                    AdminLTE.io</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- Bootstrap 4 -->
    {{-- <script src="{{ asset('tempalte') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
    <script src="{{ asset('template') }}/dist/js/jquery.validate.js"></script>
    <script src="{{ asset('template') }}/dist/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('template') }}/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('template') }}/dist/js/dataTables.bootstrap4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('template') }}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('template') }}/dist/js/demo.js"></script>

</body>

</html>
