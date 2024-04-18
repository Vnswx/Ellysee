@extends('Layout.layout')
{{-- @include('Layout.header') --}}
@section('header')
    @include('Layout.header')
@endsection

@section('content')
    <link rel="stylesheet" href="{{ asset('Layout/css/edit-profile.css') }}">
    <div class="container" style="margin-bottom: 61px">
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="user-avatar">
                                    <img width="80" id="currentProfileImage" src="{{ asset('storage/' . Auth::user()->profile_image) }}"
                                        alt="Profile Image">
                                    <div class="file-upload">
                                    <input type="file" class="form-control-file" id="profile_image" name="profile_image"
                                    onchange="previewImage(event)">
                                    <i class="fa fa-arrow-up"></i>
                                    </div>
                                    </div>
                                    <h5 class="user-name">{{ Auth::user()->name }}</h5>
                                 <h6 class="user-email">{{ Auth::user()->email }}</h6>
                                    </div>
                            {{-- <div class="about">
                    <h5>About</h5>
                    <p>I'm Yuki. Full Stack Designer I enjoy creating user-centric, delightful and human experiences.</p>
                </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-2 text-primary">Personal Details</h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Username">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="namalengkap">Full Name</label>
                                    <input type="text" name="namalengkap" class="form-control" id="namalengkap"
                                        placeholder="Enter Fullname">
                                        @error('namalengkap')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="alamat">Address</label>
                                    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Enter Address">
                                    @error('alamat')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    <button type="button" id="cancelButton" class="btn btn-secondary" onclick="window.location.href='{{ route('profile') }}'">Cancel</button>
                                    <button type="submit" id="submit" name="submit"
                                        class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('currentProfileImage');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    
@endsection

@section('footer')
    @include('Layout.footer')
@endsection
