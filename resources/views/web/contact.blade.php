@extends('web.layout', ['title' => $title])
@section('content')
    <div class="innerpage-title-area">
        <img src="{{ config('app.url') }}/web/assets/img/inner-title-bg.png" alt="" class="ita-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="innerpage-title">
                        <h2>Contact Us</h2>
                        <div class="breadcrumb-content">
                            <img src="{{ config('app.url') }}/web/assets/img/icons/home-smile.png" alt="">
                            <ul>
                                <li><a href="{{ route('index') }}">Home</a> /</li>
                                <li>Contact Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="contact-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-text">
                        <div class="section-head">
                            <p>Get In Touch</p>
                            <h3>Need Any Help? Or Looking For an Agent</h3>
                        </div>
                        <div class="section-text">
                            <p>we're committed to providing our customers with exceptional service. If you have any
                                questions, comments, or concerns about our insurance products or services, please don't
                                hesitate to contact us. Here are the different ways you can get in touch with us:</p>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="single-c-box">
                                    <img src="assets/img/icons/c-1.png" alt="">
                                    <h4>Email</h4>
                                    <p>Our friendly team is here to help.</p>
                                    <a href="mailto:gurujiimf@gmail.com">gurujiimf@gmail.com</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-c-box">
                                    <img src="assets/img/icons/c-4.png" alt="">
                                    <h4>Phone Number:</h4>
                                    <p>Mon to Fri .</p>
                                    <a href="tel:9412516844">9412516844</a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-c-box">
                                    <img src="assets/img/icons/c-3.png" alt="">
                                    <h4>Our Address:</h4>
                                    <p>Come say hello at our office.</p>
                                    <a href="#">405, Prateek Center, Sanjay Place, Agra</a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-form-map">
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
                                            <input type="text" name="phone" id="phone" placeholder="Phone Number"
                                                pattern="[7-9]{1}[0-9]{9}"
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
    <!-- /Insurance Plan Area -->
    <!-- Hero Area -->
@endsection
