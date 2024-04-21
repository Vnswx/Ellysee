@extends('Layout.layout')
{{-- @include('Layout.header') --}}
@section('header')
    @include('Layout.header')
@endsection

@section('content')
    <style>
        .card-img {
            max-width: 100%;
        }

        /* line 5, src/assets/scss/theme.scss */
        a,
        .a:hover {
            -webkit-transition: all 0.2s;
            transition: all 0.2s;
        }

        /* line 8, src/assets/scss/theme.scss */
        @media screen and (min-width: 992px) {
            .card-columns {
                -webkit-column-count: 4;
                column-count: 5;
                -webkit-column-gap: 1.25rem;
                column-gap: 1.25rem;
                orphans: 1;
                widows: 1;
            }
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
            -webkit-column-count: 4;
            column-count: 5;
            -webkit-column-gap: 1.25rem;
            column-gap: 1.25rem;
            orphans: 1;
            widows: 1;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    {{-- <div class="container">
        <h3 style="margin-top: 9.5vw">Search Results for "{{ $search }}"</h3>
    </div> --}}

    @if ($users->isEmpty())
        <div class="container text-center">
            <p style="margin-top: 20.9vw; margin-bottom: 9.9vw"><i class="fa fa-magnifying-glass"></i> There's no matching result for "{{ $search }}".
                </p>
            
        </div>
    @else
        <div class="container" style="margin-top: 9vw">
            <h2>Users</h2>
            @foreach ($users as $user)
                <div class="card">
                    <div class="card-body d-flex align-items-center">
                        @if ($user->profile_image === 'images/default_profile.jpg')
                            <img src="{{ asset('images/default_profile.jpg') }}" alt="Profile Image"
                                class="Instagram-card-user-image" width="80">
                        @else
                            <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image"
                                class="Instagram-card-user-image" width="80">
                        @endif

                        <div>
                            <a class="card-title"
                                href="{{ route('profile.view', ['username' => $user->name]) }}">{{ $user->name }}</a>
                            {{-- <p class="card-text">Deskripsi atau informasi tambahan lainnya</p> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    @if ($photos->isEmpty())
    <br>
    @else
        <div class="container" style="margin-top: 9vw">
            <h2>Images</h2>
        </div>
    @endif
    <div class="container" style="margin-top: 2vw">
        <div class="row">
            <div class="card-columns" style="margin-left: 1vw;margin-right: 1vw">
                @foreach ($photos as $photo)
                    <div class="card card-pin">
                        <a href="{{ route('detail-photo', $photo->id) }}">
                            <img class="card-img" src="{{ Storage::url($photo->lokasifile) }}" alt="Card image">
                            <div class="overlay">
                                <h2 class="card-title title">Cool Title</h2>
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
@endsection
@section('footer')
    @include('Layout.footer')
@endsection
