@extends('Layout.layout')
{{-- @include('Layout.header') --}}
@section('header')
    @include('Layout.header')
@endsection

@section('content')
    <style>
        img {
            max-width: 100%;
        }

        /* line 5, src/assets/scss/theme.scss */
        a,
        .a:hover {
            -webkit-transition: all 0.2s;
            transition: all 0.2s;
        }

        /* line 8, src/assets/scss/theme.scss */
        .container-fluid {
            width: 94%;
            margin: 0px auto;
            max-width: 94%;
        }

        /* line 13, src/assets/scss/theme.scss */
        .border-round-0 {
            border-radius: 0;
        }

        /* line 16, src/assets/scss/theme.scss */
        .mt-neg100 {
            margin-top: -100px;
        }

        /* line 19, src/assets/scss/theme.scss */
        .min-50vh {
            min-height: 50vh;
        }

        /* line 22, src/assets/scss/theme.scss */
        .dropdown-header {
            font-size: 1.5rem;
        }

        /* line 25, src/assets/scss/theme.scss */
        .fixed-top {
            border-bottom: 1px solid #f1f1f1;
        }

        /* line 28, src/assets/scss/theme.scss */
        footer.footer {
            border-top: 1px solid #f1f1f1;
        }

        /* line 31, src/assets/scss/theme.scss */
        .nav-link,
        .dropdown-item {
            font-weight: 700;
        }

        /* line 32, src/assets/scss/theme.scss */
        .navbar {
            padding: 0.5rem 2rem;
        }

        /* line 34, src/assets/scss/theme.scss */
        .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100%;
            width: 100%;
            opacity: 0;
            -webkit-transition: .2s ease;
            transition: .2s ease;
            background-color: #008CBA;
        }

        /* line 46, src/assets/scss/theme.scss */
        .card {
            border: 0;
        }

        /* line 47, src/assets/scss/theme.scss */
        .card-pin:hover .overlay {
            opacity: .5;
            border: 5px solid #f3f3f3;
            -webkit-transition: ease .2s;
            transition: ease .2s;
            background-color: #000000;
            cursor: -webkit-zoom-in;
            cursor: zoom-in;
        }

        /* line 55, src/assets/scss/theme.scss */
        .more {
            color: white;
            font-size: 14px;
            position: absolute;
            bottom: 0;
            right: 0;
            text-transform: uppercase;
            -webkit-transform: translate(-20%, -20%);
            transform: translate(-20%, -20%);
            -ms-transform: translate(-50%, -50%);
        }

        /* line 66, src/assets/scss/theme.scss */
        .card-pin:hover .card-title {
            color: #ffffff;
            margin-top: 10px;
            text-align: center;
            font-size: 1.2em;
        }

        /* line 73, src/assets/scss/theme.scss */
        .card-pin:hover .more a {
            text-decoration: none;
            color: #ffffff;
        }

        /* line 78, src/assets/scss/theme.scss */
        .card-pin:hover .download a {
            text-decoration: none;
            color: #ffffff;
        }

        /* line 83, src/assets/scss/theme.scss */
        .social {
            position: relative;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        /* line 88, src/assets/scss/theme.scss */
        .social .fa {
            margin: 0 3px;
        }

        .card-columns {
            -webkit-column-count: 3;
            column-count: 5;
            -webkit-column-gap: 1.25rem;
            column-gap: 1.25rem;
            orphans: 1;
            widows: 1;
        }
    </style>
    {{--  --}}
    <!-- ***** Features Small End ***** -->
    <!-- ***** Welcome Area Start ***** -->
    @guest
        <div class="welcome-area" id="welcome"
            style="background-image: url('{{ asset('Layout/img/banner-bg.png') }}'); background-repeat: no-repeat; background-position: center center; background-size: cover;">
            <!-- ***** Header Text Start ***** -->
            <div class="header-text">
                <div class="container">
                    <div class="row">
                        <div class="offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 col-md-12 col-sm-12">
                            <h1>Where Art Meets Elegance Explore <strong>Ellysee's</strong><br>Gallery of <strong>Inspired
                                    Creations.</strong></h1>

                            {{-- <a href="#features" class="main-button-slider">Discover More</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- ***** Header Text End ***** -->
        </div>
        <!-- ***** Features Big Item Start ***** -->
        <section class="section padding-top-70 padding-bottom-0" id="features">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-12 col-sm-12 align-self-center"
                        data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                        <img src="{{ asset('Layout/img/left-image.png') }}" class="rounded img-fluid d-block mx-auto"
                            alt="App">
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-top-fix">
                        <div class="left-heading">
                            <h2 class="section-title">Let’s discuss about you project</h2>
                        </div>
                        <div class="left-text">
                            <p>Nullam sit amet purus libero. Etiam ullamcorper nisl ut augue blandit, at finibus leo efficitur.
                                Nam gravida purus non sapien auctor, ut aliquam magna ullamcorper.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hr"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Features Big Item End ***** -->

        <!-- ***** Features Big Item Start ***** -->
        <section class="section padding-bottom-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-bottom-fix">
                        <div class="left-heading">
                            <h2 class="section-title">We can help you to grow your business</h2>
                        </div>
                        <div class="left-text">
                            <p>Aenean pretium, ipsum et porttitor auctor, metus ipsum iaculis nisi, a bibendum lectus libero
                                vitae urna. Sed id leo eu dolor luctus congue sed eget ipsum. Nunc nec luctus libero. Etiam quis
                                dolor elit.</p>
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-5 col-md-12 col-sm-12 align-self-center mobile-bottom-fix-big"
                        data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                        <img src="{{ asset('Layout/img/right-image.png') }}" class="rounded img-fluid d-block mx-auto"
                            alt="App">
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Features Big Item End ***** -->



        <!-- ***** Contact Us Start ***** -->
        <section class="section colored" id="contact-us">
            <div class="container">
                <!-- ***** Section Title Start ***** -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="center-heading">
                            <h2 class="section-title">Join Us!</h2>
                        </div>
                    </div>
                    <div class="offset-lg-3 col-lg-6">
                        <div class="center-text">
                            <p>Let's explore new ideas together and give them a try!
                            </p>
                        </div>
                    </div>
                </div>
                <!-- ***** Section Title End ***** -->

                <div class="row">
                    <!-- ***** Contact Text Start ***** -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <h5 class="margin-bottom-30">Register to get new ideas.</h5>
                        <div class="contact-text">
                            <p>Are you ready to embark on an exciting journey with us? Join our app and unlock a myriad of features designed to enhance your experience. we've got everything you need to take your digital adventure to the next level. Don't miss out on the opportunity to connect, create, and explore with us. Sign up now and let's start this incredible journey together!</p>
                        </div>
                    </div>
                    <!-- ***** Contact Text End ***** -->

                    <!-- ***** Contact Form Start ***** -->
                    <div class="col-lg-8 col-md-6 col-sm-12">
                        <div class="contact-form">
                            <form method="POST" action="{{ route('actionregister') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <fieldset>
                                            <input type="text" class="form-control" id="namalengkap" placeholder="Full Name"
                                                name="namalengkap" value="{{ old ('namalengkap') }}" required> 
                                            @error('namalengkap')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <fieldset>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Username"
                                            value="{{ old('name') }}" required>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <fieldset>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <fieldset>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                                            required autocomplete="new-password">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Address"
                                                value="{{ old('alamat') }}" required>
                                            @error('alamat')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="main-button">Register</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- ***** Contact Form End ***** -->
                </div>
            </div>
        </section>
        <!-- ***** Contact Us End ***** -->
    @endguest
    @auth
        <div class="container" style="margin-top: 9vw">
            <div class="row">
                <div class="card-columns" style="margin-left: 1vw;margin-right: 1vw">
                    @foreach ($photos as $photo)
                        <div class="card card-pin">
                            <a href="{{ route('detail-photo', $photo->id) }}">
                                <img class="card-img" src="{{ Storage::url($photo->lokasifile) }}" alt="Card image">
                                <div class="overlay">
                                    <h2 class="card-title title">{{ $photo->judulfoto }}</h2>
                                    <div class="more">
                                        <a href="{{ route('detail', encrypt($photo->id)) }}">
                                            <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> More </a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    @endauth
@endsection

@section('footer')
    @include('Layout.footer')
@endsection
