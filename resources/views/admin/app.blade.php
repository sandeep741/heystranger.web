<!DOCTYPE html>
<html>
    <head>
        @include('admin.layouts.head')
    </head>
    <body>
        <!-- Main navbar -->
        @include('admin.layouts.header')
        <!-- /main navbar -->
        <!-- Page container -->
        <div class="page-container">
            <!-- Page content -->
            <div class="page-content">
                <!-- Main sidebar -->
                @include('admin.layouts.sidebar')
                <!-- /main sidebar -->
                <!-- Main content -->
                <div class="content-wrapper">
                    <!-- Page header -->
                    @include('admin.layouts.page-header')
                    <!-- /page header -->
                    <!-- Content area -->
                    <div class="content">
                        <!-- Dashboard content -->
                        @yield('content')
                        <!-- /dashboard content -->
                        @include('admin.layouts.footer')
                    </div>
                    <!-- /content area -->
                </div>
                <!-- /main content -->
            </div>
            <!-- /page content -->
        </div>
        <!-- /page container -->
        <!-- Core JS files -->
        <script type="text/javascript" src="{{ asset('/assets/admin/js/pace.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/assets/admin/js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/assets/admin/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/assets/admin/js/blockui.min.js') }}"></script>
        <!-- /core JS files -->
        @yield('jscript')
    </body>
</html>