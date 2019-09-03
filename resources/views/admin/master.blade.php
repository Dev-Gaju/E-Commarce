<html>
@include('admin.includes.head-link');

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

@include('admin.includes.header-content');
    @include('admin.includes.sidebar-content');
    @yield('main-content');


    <!-- Content Wrapper. Contains page content -->

    <!-- /.content-wrapper -->
    {{--<footer class="main-footer">--}}
        {{--<div class="pull-right hidden-xs">--}}
            {{--<b>Version</b> 2.4.0--}}
        {{--</div>--}}
        {{--<strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights--}}
        {{--reserved.--}}
    {{--</footer>--}}

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

</body>
</html>