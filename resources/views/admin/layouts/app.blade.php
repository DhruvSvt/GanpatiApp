<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>Ganpati Society Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Ganpati Society Admin" name="description" /> <!-- App favicon -->
    <link rel="shortcut icon" href="{{ config('app.url') }}assets/images/cropped-favicon1-32x32.png">

    <!-- Layout config Js -->
    <script src="{{ config('app.url') }}assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="{{ config('app.url') }}assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ config('app.url') }}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ config('app.url') }}assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ config('app.url') }}assets/css/custom.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="layout-wrapper">
        @include('admin.inc.header')

        @include('admin.inc.sidebar')
    </div>

       <!-- JAVASCRIPT -->
       <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
       <script src="assets/libs/simplebar/simplebar.min.js"></script>
       <script src="assets/libs/node-waves/waves.min.js"></script>
       <script src="assets/libs/feather-icons/feather.min.js"></script>
       <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
       <script src="assets/js/plugins.js"></script>

       <!-- apexcharts -->
       <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

       <!-- Vector map-->
       <script src="assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
       <script src="assets/libs/jsvectormap/maps/world-merc.js"></script>

       <!--Swiper slider js-->
       <script src="assets/libs/swiper/swiper-bundle.min.js"></script>

       <!-- Dashboard init -->
       <script src="assets/js/pages/dashboard-ecommerce.init.js"></script>

       <!-- App js -->
       <script src="assets/js/app.js"></script>
</body>

</html>
