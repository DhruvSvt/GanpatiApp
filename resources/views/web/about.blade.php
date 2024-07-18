@extends('web.layout', ['title' => $title])
@section('content')
    <div class="innerpage-title-area">
        <img src="{{ config('app.url') }}/web/assets/img/inner-title-bg.png" alt="" class="ita-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="innerpage-title">
                        <h2>About Us</h2>
                        <div class="breadcrumb-content">
                            <img src="{{ config('app.url') }}/web/assets/img/icons/home-smile.png" alt="">
                            <ul>
                                <li><a href="{{ route('index') }}">Home</a> /</li>
                                <li>About Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
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
    <!-- /Insurance Plan Area -->
    <!-- Hero Area -->
@endsection
