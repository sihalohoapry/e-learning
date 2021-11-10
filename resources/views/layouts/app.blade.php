<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->

    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{{ asset('admin/dist/img/logo-smk.png') }}" alt="Logo SMK" height="60"
                width="60">
        </div>
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->

        @include('includes.sidebar')


        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- /.content-wrapper -->



        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2021 E-Learning</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.1.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
</body>

</html>