<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>{{ $title ?? 'Guruji IMF' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Guruji IMF" name="description" /> <!-- App favicon -->
    <link rel="shortcut icon" href="{{ config('app.url') }}/assets/images/logoicon.png">

    <!-- Layout config Js -->
    <script src="{{ config('app.url') }}/assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="{{ config('app.url') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ config('app.url') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ config('app.url') }}/assets/css/app.min.css?v=85" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ config('app.url') }}/assets/css/custom.min.css?v=85" rel="stylesheet" type="text/css" />
    <!-- cloudflare bootstrap-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
     alpha/css/bootstrap.css" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!--Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Toaster -->
    @yield('heads')
</head>

<body>
    <div id="layout-wrapper">
        @include('admin.inc.header')

        @include('admin.inc.sidebar')
    </div>


    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    @include('admin.inc.footer')


 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>

  @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
  @endif
  @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
  @endif
  @if(Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}");
  @endif
  @if(Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
  @endif
</script>
    @yield('scripts')

</body>

</html>
