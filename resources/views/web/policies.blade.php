@extends('web.layout', ['title' => $title, 'description' => $desc])
@section('content')
    <div class="innerpage-title-area">
        <img src="{{ config('app.url') }}/web/assets/img/inner-title-bg.png" alt="" class="ita-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="innerpage-title">
                        <h2>{{ $cat->name }}</h2>
                        <div class="breadcrumb-content">
                            <img src="{{ config('app.url') }}/web/assets/img/icons/home-smile.png" alt="">
                            <ul>
                                <li><a href="{{ route('index') }}">Home</a> /</li>
                                <li>{{ $cat->name }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <section class="insuarance-plan-area insuarance-plan-areav2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-head">
                        <h4>Our {{ $cat->name }} Services</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        @foreach ($policies as $society)
                            <div class="col-md-6">
                                <a href="{{ route('policy', $society->slug) }}">
                                    <div class="single-i-plan sip-v2">
                                        <div class="sip-img">
                                            <img src="{{ Storage::url($society->image) }}"
                                                onerror="this.onerror=null;this.src='{{ config('app.url') }}/assets/images/user-badge-vector-removebg-preview.png';"
                                                alt="">
                                        </div>
                                        <div class="sip-icon">
                                            <img src="{{ config('app.url') }}/web/assets/img/icons/ipi-1.png"
                                                alt="">
                                        </div>
                                        <div class="sip-text">
                                            <h4>{{ $society->name }}</h4>
                                            <p>{{ $society->sdescr }}</p>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-service">
                        <div class="get-in-touch-content">
                            <div class="section-head">
                                <p>&nbsp;</p>
                                <h3>Request A Call Back!</h3>
                            </div>

                            <div class="gitouch-form">
                                @php
                                    $Footer_cat = \App\Models\Category::where(['status' => 1])
                                        ->orderBy('id', 'DESC')
                                        ->get();
                                @endphp
                                <form action="{{ route('enquiry.submit') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="full_name">Your Full Name *</label>
                                                <input type="text" name="name" id="full_name" placeholder="Full Name"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">Phone Number *</label>
                                                <input type="text" name="phone" id="phone"
                                                    placeholder="Phone Number" pattern="[7-9]{1}[0-9]{9}"
                                                    title="Phone number with 7-9 and remaing 9 digit with 0-9" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="email_a">Date Of Birth</label>
                                                <input type="date" name="dob" id="email_a" placeholder="dob">
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
    </section>
    <!-- /Insurance Plan Area -->
    <!-- Hero Area -->
@endsection
