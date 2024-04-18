@extends('Layout.layout')
{{-- @include('Layout.header') --}}
@section('header')
    @include('Layout.header')
@endsection

@section('content')
    <link rel="stylesheet" href="{{ asset('Layout/css/edit-profile.css') }}">
    <form method="POST" action="{{ route('albums-create') }}">
        @csrf
        <div class="container" style="margin-bottom: 40px">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Create Album</h5>
                            <div class="form-group">
                                <label for="namaalbum">Title</label>
                                <input type="text" name="namaalbum" class="form-control" id="namaalbum" placeholder="Enter Title">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Description</label>
                                <input type="text" name="deskripsi" class="form-control" id="deskripsi" placeholder="Enter Description">
                            </div>
                            <div class="text-right">
                                <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ route('profile') }}'">Cancel</button>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('footer')
    @include('Layout.footer')
@endsection
