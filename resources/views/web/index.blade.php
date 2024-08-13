@extends('web.layout', ['title' => $title, 'description' => $desc])
@section('content')
    <!-- Hero Area -->
    <section class="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="hero-left-content">
                        <div class="hero-text Home">


                            <h1>Let's find you
                                the <br><b style="    color: #e73f4e;">Best Insurance</b></h1>
                            <p>We offers a large range of premium insurance packages at affordable prices. Start an
                                online quote or have a representative call you back. It’s that simple.</p>
                            <div class="hero-btn">
                                <a href="{{ route('contact') }}" class="btn-style-1">Contact Us</a>
                                <a href="#exampleModal" class="btn-style-2" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Get A Quote</a>
                            </div>



                        </div>

                    </div>
                </div>
                <div class="offset-md-1 col-md-5">
                    <div class="item">
                        <img src="{{ config('app.url') }}/web/assets/images/banner.png">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Hero Area -->
    <!--<section class="white-blue-gradient "></section>-->
    <section class="easy-way-service-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-head text-center mb-5">
                        <h3 style="max-width: 100%">Our Services</h3>
                    </div>
                </div>
            </div>
            <div class="row">


                @foreach ($cat as $society)
                    <div class="col-md-4">
                        <div class="single-service-step">
                            <div class="sst-img">

                                <a href="{{ route('policies', $society->slug) }}">
                                    <img src="{{ Storage::url($society->image) }}"
                                        onerror="this.onerror=null;this.src='{{ config('app.url') }}/assets/images/user-badge-vector-removebg-preview.png';"
                                        alt="{{ $society->name }}">
                                    <h4>{{ $society->name }}</h4>
                                </a>

                            </div>

                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <!-- Experience Area -->


    <section class="experience-area" style="    padding: 80px 0px 80px;
background-color: #f4f9ff;">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <div class="eatext">
                        <div class="section-head">
                            <p>About <span class="text-danger">Guruji IMF</span></p>
                            <h3 class="w-100" style="max-width:100%">Are You Looking for Insurance Services?.
                            </h3>
                        </div>
                        <p>At Guruji IMF, we are dedicated to safeguarding your most valuable assets. We have grown into
                            a trusted provider offering a comprehensive range of insurance products, including home,
                            auto, health, and life coverage. Our mission is to provide personalized solutions tailored
                            to meet the unique needs of each client.<br> With a customer-first approach, we pride
                            ourselves
                            on delivering exceptional service and support. Our team of experienced professionals is
                            committed to helping you navigate the complexities of insurance with ease and confidence,
                            ensuring peace of mind and financial security for you and your loved ones..</p>
                    </div>

                    <div class="ea-btn-wrapper">
                        <a href="{{ route('about') }}" class="btn-style-3">Read More</a>
                    </div>
                </div>
                <div class="offset-md-1 col-md-5">
                    <div class="ea-counter">
                        <div class="row">
                            <div class="col-6">
                                <div class="single-counterup">
                                    <img src="{{ config('app.url') }}/web/assets/images/mobile-banking.png">
                                    <h4><span class="counterup">2.9</span>k</h4>
                                    <p>Give Insurances</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="single-counterup">
                                    <img src="{{ config('app.url') }}/web/assets/images/dinosaur.png">
                                    <h4><span class="counterup">75</span></h4>
                                    <p>Professional Team</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="single-counterup">
                                    <img src="{{ config('app.url') }}/web/assets/images/money-bag.png">
                                    <h4><span class="counterup">230.4</span>Cr+</h4>
                                    <p>Successsful Disbursal</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="single-counterup">
                                    <img src="{{ config('app.url') }}/web/assets/images/user.png">
                                    <h4><span class="counterup">23.4</span>k</h4>
                                    <p>Satisfied Customers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Experience Area -->

    <!-- Our Easy Services Area -->

    <!-- /Our Easy Services Area -->
    <section class="testimonial-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-8">
                    <div class="section-head">
                        <h3>What our <b>Customers</b> are talking about</h3>
                    </div>
                </div>
                <div class="col-md-6 col-4">
                    <div class="testimonial-nav">
                        <button class="testimonial-prev-btn"><i class='fa fa-angle-left'></i></button>
                        <button class="testimonial-next-btn"><i class='fa fa-angle-right'></i></button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="testimonial-wrapper">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="testimonial-carousel owl-carousel owl-theme">
                                    <div class="item">
                                        <div class="single-testimonial">
                                            <div class="st-text">
                                                <p>Policy Hut Peoples are Really amazing and humble. I am taking their
                                                    services from last 2 years and getting good discount</p>
                                            </div>
                                            <div class="st-footer">
                                                <div class="st-author">

                                                    <div class="sta-text">
                                                        <h4>Pritpal Singh Sethi</h4>
                                                        <p>Agra</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="single-testimonial">
                                            <div class="st-text">
                                                <p>Got my entire family health and life Insurance through Policy Hut.
                                                    Policy issued on time and details explained well.</p>
                                            </div>
                                            <div class="st-footer">
                                                <div class="st-author">

                                                    <div class="sta-text">
                                                        <h4>Parteek Kapoor</h4>
                                                        <p>Delhi</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="single-testimonial">
                                            <div class="st-text">
                                                <p>I purchased my Toyoto Innova Insurance at Big Discount through Policy
                                                    Hut. Their service is also perfect.</p>
                                            </div>
                                            <div class="st-footer">
                                                <div class="st-author">
                                                    <div class="sta-img">
                                                        <img src="{{ config('app.url') }}/web/assets/img/avatar.png"
                                                            alt="">
                                                    </div>
                                                    <div class="sta-text">
                                                        <h4>Amit Jain</h4>
                                                        <p>Kanpur</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="global-clients">
        <div class="container">

            <div class="row">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-head text-center mb-5">
                            <h3 style="max-width: 100%">Our Best <b>Insurance Providers </b></h3>
                        </div>

                    </div>

                </div>
                <div class="col-md-12">
                    <div class="clients-lis-bot">
                        <ul class="client-lists">
                            <li><a href="#0" title="Bank">
                                    <div class="logo-icon icicipru"><img
                                            src="{{ config('app.url') }}/assets/img/Life_Insurance_Corporation_of_India_(logo).svg"
                                            alt="Bank">
                                    </div>
                                </a></li>
                            <li><a href="#0" title="Bank">
                                    <div class="logo-icon icicipru"><img
                                            src="{{ config('app.url') }}/assets/images/a958c79fd4b39865097be6cbf8a302ca.jpg"
                                            alt="Bank">
                                    </div>
                                </a></li>

                            <li><a href="#0" title="Bank">
                                    <div class="logo-icon icicipru"><img
                                            src="{{ config('app.url') }}/web/assets/img/download.jpeg" alt="Bank">
                                    </div>
                                </a></li>
                            <li><a href="#0" title="Bank">
                                    <div class="logo-icon icicipru"><img
                                            src="{{ config('app.url') }}/web/assets/img/1679939498-7188.avif"
                                            alt="Bank">
                                    </div>
                                </a></li>
                            <li><a href="#0" title="Bank">
                                    <div class="logo-icon icicipru"><img
                                            src="{{ config('app.url') }}/web/assets/img/download_care.png"
                                            alt="Bank">
                                    </div>
                                </a></li>
                            <li><a href="#0" title="Bank">
                                    <div class="logo-icon icicipru"><img
                                            src="{{ config('app.url') }}/web/assets/img/hi-logo-Niva.png" alt="Bank">
                                    </div>
                                </a></li>
                            <li><a href="#0" title="Bank">
                                    <div class="logo-icon icicipru"><img
                                            src="{{ config('app.url') }}/web/assets/img/images (1).png" alt="Bank">
                                    </div>
                                </a></li>
                            <li><a href="#0" title="Bank">
                                    <div class="logo-icon icicipru"><img
                                            src="{{ config('app.url') }}/web/assets/img/LOMBARD.jpg" alt="Bank">
                                    </div>
                                </a></li>
                            <li><a href="#0" title="Bank">
                                    <div class="logo-icon icicipru"><img
                                            src="{{ config('app.url') }}/web/assets/img/TATA_AIG_logo-1.png"
                                            alt="Bank"></div>
                                </a></li>
                            <li><a href="#0" title="Bank">
                                    <div class="logo-icon icicipru"><img
                                            src="{{ config('app.url') }}/web/assets/img/downloaddfgh.png" alt="Bank">
                                    </div>
                                </a></li>
                            <li><a href="#0" title="Bank">
                                    <div class="logo-icon icicipru"><img
                                            src="{{ config('app.url') }}/web/assets/img/download-ef.jpeg" alt="Bank">
                                    </div>
                                </a></li>
                            <li><a href="#0" title="Bank">
                                    <div class="logo-icon icicipru"><img
                                            src="{{ config('app.url') }}/web/assets/img/download-iffco.png"
                                            alt="Bank">
                                    </div>
                                </a></li>
                            <li><a href="#0" title="Bank">
                                    <div class="logo-icon icicipru"><img
                                            src="{{ config('app.url') }}/web/assets/img/DFASFA.jpg" alt="Bank">
                                    </div>
                                </a></li>
                            <li><a href="#0" title="Bank">
                                    <div class="logo-icon icicipru"><img
                                            src="{{ config('app.url') }}/web/assets/img/the-new-india-assurance-co-ltd-logo-E0B018F777-seeklogo.com.png"
                                            alt="Bank">
                                    </div>
                                </a></li>
                            <li><a href="#0" title="Bank">
                                    <div class="logo-icon icicipru"><img
                                            src="{{ config('app.url') }}/web/assets/images/images.png" alt="Bank">
                                    </div>
                                </a></li>
                            <li><a href="#0" title="Bank">
                                    <div class="logo-icon icicipru"><img
                                            src="{{ config('app.url') }}/web/assets/img/2023_3$largeimg17_Mar_2023_175740793.jpg"
                                            alt="Bank">
                                    </div>
                                </a></li>
                            <li><a href="#0" title="Bank">
                                    <div class="logo-icon icicipru"><img
                                            src="{{ config('app.url') }}/web/assets/img/ef37b6903c86b935681044838344ffe2.jpg"
                                            alt="Bank">
                                    </div>
                                </a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
