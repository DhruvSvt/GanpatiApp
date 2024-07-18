<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--- Basic Page Needs  -->
    <link rel="canonical" href="{{ Request::url() }}" />
    <title>{{ $title ?? 'Guruji IMF' }}</title>
    <meta name="description" content="{{ $description ?? 'Guruji IMF' }}">
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $title ?? 'Guruji IMF' }}" />
    <meta property="og:description" content="{{ $description ?? 'Guruji IMF' }}" />
    <meta property="og:url" content="https://mdayurvediccollege.in/demo/loan/" />
    <meta property="og:site_name" content="Guruji IMF" />
    <meta property="og:image" content="{{ config('app.url') }}/assets/images/logo-on.jpg" />




    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ config('app.url') }}/web/assets/css/animate.css">
    <link rel="stylesheet" href="{{ config('app.url') }}/web/assets/css/lightbox.min.css">
    <!-- Main StyleSheet CSS -->
    <link rel="stylesheet" href="{{ config('app.url') }}/web/assets/css/style.css?v=1721034640">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ config('app.url') }}/web/assets/css/responsive.css?v=1721034640">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ config('app.url') }}/assets/images/logoicon.png">



    <!-- ============ FAVICON ============ -->

    <meta name="theme-color" content="#3a4888">
    <meta name="msapplication-TileColor" content="#3a4888">
    <meta name="msapplication-navbutton-color" content="#3a4888">
</head>

<body>


    @php
        $Footer_cat = \App\Models\Category::where(['status' => 1])
            ->orderBy('id', 'DESC')
            ->get();
    @endphp
    <style>
        .alert.alert-success {
            position: fixed;
            bottom: 0;
            right: 6px;
            z-index: 1000;
        }
    </style>



    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 meanmenu-effect">
                    <div class="ht-left">
                        <p><i class="fa-solid fa-phone"></i>9412516844</p>
                    </div>
                </div>
                <div class="col-md-6 meanmenu-effect">
                    <div class="ht-right">
                        <p><i class="fa-regular fa-envelope-open"></i>gurujiimf@gmail.com</p>

                        <ul class="ht-social">
                            <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <header class="header-section bgadd ">
        <div class="container">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="{{ route('index') }}"><img
                            src="{{ config('app.url') }}/assets/images/logo-on.jpg" alt="logo"></a>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('index') }}">Home</a>
                            </li>
                            {{-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Services
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Loan</a></li>
                                    <li><a class="dropdown-item" href="#">Credit Card</a></li>
                                    <li><a class="dropdown-item" href="#">Insurance</a></li>
                                </ul>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about') }}">About Us</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact') }}">Contact Us &nbsp;&nbsp;</a>
                            </li>

                        </ul>
                        <div class="menu-right-components">
                            <div class="menur-components">
                                <a href="#exampleModal" class="mr-btn h-sign-in" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Get A Quote</a>
                                <a href="{{ route('admin.index') }}" class="mr-btn h-sign-up">Login</a>
                            </div>
                            <div class="header-bar d-lg-none">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>


        </div>
    </header>
    <!-- /Header Area -->


    @yield('content')
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"></span>
            </button>
        </div>
    @endif
    <!-- Footer -->
    <footer class="footer-area">
        <div class="footer-widgets">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d-flex">
                        <div class="f-widgets m-0">
                            <h4>Guruji IMF</h4>
                            <div class="fl-single-w">
                                <p>Call Us</p>
                                <h5><a href="tel:" style=" font-size: inherit;    color: #c5c7ce;">+91 85296
                                        963852</a></h5>
                            </div>
                            <div class="fl-single-w">
                                <p>Email Us</p>
                                <h5><a href="mailto:gurujiimf@gmail.com"
                                        style=" color: #c5c7ce;   font-size: inherit;">gurujiimf@gmail.com</a>
                                </h5>
                            </div>

                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="f-widgets">
                            <h4>Insurance</h4>
                            <div class="fw-links">
                                <ul>
                                    @foreach ($Footer_cat as $row)
                                        <li><a href="{{ route('policies', $row->slug) }}">{{ $row->name }}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="f-widgets">
                            <h4>Company</h4>
                            <div class="fw-links">
                                <ul>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Contact</a></li>

                                    <li><a href="#">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">

                        <div class="fbottom-copyrights">
                            <p>© 2024 gurujiimf.com - All Rights Reserved | Designed & Developed By <a
                                    style="color: #c5c7ce;
    font-size: inherit;" href="https://svtindia.in/">SVT
                                    INDIA</a></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="f-social">
                            <ul>

                                <li><a href="#" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                                </li>

                                <li><a href="#" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="    background: #d1e2ff;">
                    <h5 class="modal-title" id="exampleModalLabel">Enquire Now</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="    background: #a6c4f5;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="get-in-touch-content">
                                    <div class="section-head">
                                        <p>&nbsp;</p>
                                        <h3>Request A Call Back!</h3>
                                    </div>

                                    <div class="gitouch-form">
                                        <form action="{{ route('enquiry.submit') }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="full_name">Your Full Name *</label>
                                                        <input type="text" name="name" id="full_name"
                                                            placeholder="Full Name" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone">Phone Number *</label>
                                                        <input type="text" name="phone" id="phone"
                                                            placeholder="Phone Number" pattern="[7-9]{1}[0-9]{9}"
                                                            title="Phone number with 7-9 and remaing 9 digit with 0-9"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="email_a">Date Of Birth</label>
                                                        <input type="date" name="dob" id="email_a"
                                                            placeholder="dob">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="i_type">Gender</label>
                                                        <select name="gender" id="i_type" required>

                                                            <option value="">-Select-</option>
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                            <option>Other</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="i_type">Policy Type</label>
                                                        <select name="ptype" id="i_type" required>

                                                            <option value="">-Select-</option>
                                                            @foreach ($Footer_cat as $row)
                                                                <option>{{ $row->name }}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="gitouch-submit">
                                                        <input type="submit" class="btn-style-a" value="Get a Call">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="{{ config('app.url') }}/web/assets/js/jquery-3.2.0.min.js"></script>
    <!-- Owl Carousel Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js">
    </script>
    <!-- Main Counterup Plugin-->
    <script src="{{ config('app.url') }}/web/assets/js/jquery.counterup.min.js"></script>
    <script src="{{ config('app.url') }}/web/assets/js/jquery.scrollUp.js"></script>
    <script src="{{ config('app.url') }}/web/assets/js/jquery.mixitup.min.js"></script>
    <script src="{{ config('app.url') }}/web/assets/js/jquery.waypoints.min.js"></script>
    <script src="{{ config('app.url') }}/web/assets/js/lightbox.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Main Script -->
    <script src="{{ config('app.url') }}/web/assets/js/theme.js"></script> <!-- /Footer -->

    <!-- Scripts -->
    <!-- jQuery Plugin -->

</body>

</html>
