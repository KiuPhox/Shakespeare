<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Shakespeare Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- third party css -->
    <link href="assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <!-- App css -->
    <link href="{{asset('admin/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/css/app-modern.min.css')}}" rel="stylesheet" type="text/css" id="light-style" />
    <link href="{{asset('admin/css/app-modern-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style" />
    @yield('styles')
</head>

<body class="loading" data-layout="detached" data-layout-config='{"leftSidebarCondensed":false,"darkMode":false, "showRightSidebarOnStart": true}'>

<!-- Topbar Start -->
@include('admin.layouts.header-admin')
<!--Topbar End-->

<!-- Start Content-->
<div class="container-fluid">

    <!-- Begin page -->
    <div class="wrapper" style="max-width: 100%">

        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.layouts.leftsidebar-admin')
        <!-- Left Sidebar End -->

        <!-- Content Start -->
        <div class="content-page" style="width: 100%">
            <div class="content">
                @yield('content-admin')
            </div>
        </div>
        <!-- End Content -->


            <!-- Footer Start -->
            @include('admin.layouts.footer-admin')
            <!-- end Footer -->

    </div> <!-- content-page -->

</div> <!-- end wrapper-->

<!-- END Container -->


<!-- Right Sidebar -->



<!-- /Right-bar -->


@yield('scripts')
<!-- bundle -->
<script src="{{asset('admin/js/vendor.min.js')}}"></script>
<script src="{{asset('admin/js/app.min.js')}}"></script>

<!-- third party js -->
<script src="assets/js/vendor/apexcharts.min.js"></script>
<script src="assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
<!-- third party js ends -->

<!-- demo app -->
<script src="assets/js/pages/demo.dashboard.js"></script>
<!-- end demo js-->

</body>
</html>


<style>
    body {
        font-family: 'Swiss 721', sans-serif;
        font-size: 14px;
        margin: 0;
    }

    a, a:hover, a:visited, a:active {
        color: inherit;
        text-decoration: none;
    }
</style>
