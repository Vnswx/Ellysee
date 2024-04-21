@extends('Layout.layout')
{{-- @include('Layout.header') --}}
@section('header')
    @include('Layout.header')
@endsection

@section('content')
    <style>
        .row {
            display: inline;
        }

        .card-img {
            max-width: 100%;
            max-height: 150px;
            min-width: 150px;
            min-height: 150px;
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
            max-width: 50%;
            width: 100%;
            opacity: 0;
            -webkit-transition: .2s ease;
            transition: .2s ease;
            background-color: #008CBA;
        }

        /* line 46, src/assets/scss/theme.scss */
        .card {
            max-height: 150px;
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
    <link rel="stylesheet" href="{{ asset('Layout/css/profile.css') }}">
    <div class="container cont d-flex justify-content-center align-items-center">
        <div class="card-profile">
            <div class="upper">
                {{-- <img src="https://i.pinimg.com/564x/60/06/6b/60066bac610bc179399cd6f2cd664772.jpg" class="img-fluid" width="80" height="10"> --}}
            </div>

            <div class="user text-center">
                <div class="profile">
                    @if ($user->profile_image === 'images/default_profile.jpg')
                        <img src="{{ asset('images/default_profile.jpg') }}" alt="Profile Image" class="rounded-circle"
                            width="80">
                    @else
                        <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image" class="rounded-circle"
                            width="80">
                    @endif
                </div>
            </div>

            <div class="mt-5 text-center">
                <h4 class="mb-0"> {{ $user->name }}</h4>
                <span class="text-muted d-block mb-2"> {{ $user->alamat }}</span>
                @if ($isOwnProfile)
                    <a class="btn btn-primary btn-sm follow" href="{{ route('edit-profile') }}">Edit Profile</a>
                @else
                @endif

                <div class="d-flex justify-content-between align-items-center mt-4 px-4">
                    <div class="stats">
                        <h6 class="mb-0">Photo</h6>
                        <span>{{ $totalPhotosCount }}</span>
                    </div>
                    <div class="stats">
                        <h6 class="mb-0">Albums</h6>
                        <span>{{ $totalAlbumsCount }}</span>
                    </div>
                    <div class="stats">
                        <h6 class="mb-0">Likes</h6>
                        <span>{{ $totalLikesCount }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


        {{-- <div class="container">
            <div class="album-list">
                <div class="grid-container">
                    @foreach ($albums as $album)
                        <div class="card">
                            <div class="card-header">
                                {{ $album->namaalbum }}
                            </div>
                            <div class="card-body">
                                <a href="{{ route('profile.showAlbum', ['album' => $album->encrypted_id]) }}">Lihat Foto</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div> --}}
    @if (auth()->check() && $user->id === auth()->user()->id)
        @if ($photos->isEmpty())
            <p>This user has not posted anything yet.</p>
        @else
            <div class="container" style="margin-top: 9vw">
        <div class="row">
            <div class="card-columns" style="margin-left: 1vw;margin-right: 1vw">
                @foreach ($photos as $photo)
                    <div class="card card-pin" style="height: 100%">
                        <a href="{{ route('detail-photo', $photo->id) }}">
                            <img class="card-img" src="{{ Storage::url($photo->lokasifile) }}" alt="Card image">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
        @endif
    @else
        @if ($photos->isEmpty())
            <p>This user has not posted anything yet. <a href="{{ route('photos.create') }}">Post a Photo!</a></p>
        @else
            <div class="container" style="margin-top: 9vw">
        <div class="row">
            <div class="card-columns" style="margin-left: 1vw;margin-right: 1vw">
                @foreach ($photos as $photo)
                    <div class="card card-pin" style="height: 100%">
                        <a href="{{ route('detail-photo', $photo->id) }}">
                            <img class="card-img" src="{{ Storage::url($photo->lokasifile) }}" alt="Card image">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
        @endif
    @endif

    
@endsection

@section('footer')
    @include('Layout.footer')
@endsection
