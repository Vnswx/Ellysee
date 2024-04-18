@extends('Layout.layout')
{{-- @include('Layout.header') --}}
@section('header')
    @include('Layout.header')
@endsection

@section('content')
    <style>
        .album-list {
            display: flex;
            justify-content: center;
            /* Pusatkan grid di tengah */
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            /* Kolom yang responsif */
            gap: 20px;
            /* Jarak antar card */
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #f0f0f0;
            padding: 10px;
            border-bottom: 1px solid #ccc;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .card-body {
            padding: 10px;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('Layout/css/profile.css') }}">
    <div class="container cont d-flex justify-content-center align-items-center">
        <div class="card">
            <div class="upper">
                {{-- <img src="https://i.pinimg.com/564x/60/06/6b/60066bac610bc179399cd6f2cd664772.jpg" class="img-fluid" width="80" height="10"> --}}
            </div>
    
            <div class="user text-center">
                <div class="profile">
                    @if ($user->profile_image === 'images/default_profile.jpg')
                        <img src="{{ asset('images/default_profile.jpg') }}" alt="Profile Image" class="rounded-circle"
                            width="80">
                    @else
                        <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image"
                            class="rounded-circle" width="80">
                    @endif
                </div>
            </div>
    
            <div class="mt-5 text-center">
                <h4 class="mb-0"> {{$user->name }}</h4>
                <span class="text-muted d-block mb-2"> {{ $user->alamat }}</span>
                @if($isOwnProfile)
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
    <section class="mini" id="work-process">
        <div class="mini-content">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-3 col-lg-6">
                        <div class="info">
                            <h1>Work Process</h1>
                            <p>Aenean nec tempor metus. Maecenas ligula dolor, commodo in imperdiet interdum, vehicula ut ex. Donec ante diam.</p>
                        </div>
                    </div>
                </div>
    
                <!-- ***** Mini Box Start ***** -->
                <div class="row">
                @foreach ($albums as $album)
                    <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <a href="{{ route('profile.showAlbum', ['album' => $album->encrypted_id]) }}" class="mini-box">
                            <i><img src="{{ asset('Layout/img/work-process-item-01.png') }}" alt=""></i>
                            <strong>{{ $album->namaalbum }}</strong>
                            <span>Godard pabst prism fam cliche.</span>
                        </a>
                    </div>
                    @endforeach
                </div>
                <!-- ***** Mini Box End ***** -->
            </div>
        </div>
    </section>
@endsection

@section('footer')
    @include('Layout.footer')
@endsection
