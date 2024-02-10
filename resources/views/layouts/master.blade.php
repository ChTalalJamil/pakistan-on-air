<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
    @yield('header')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->

        @include('layouts.navbar')

        <!-- /.navbar -->

        <!-- Sidebar -->

        @include('layouts.sidebar')

        <!-- /. Side Bar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @yield('content-header')
            
            <!-- /.content-header -->

            <!-- Main content -->
            @yield('content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('layouts.footer')
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->

    @include('layouts.scripts')

    @yield('script')

    <!-- ./ jQuery  -->
</body>

</html>