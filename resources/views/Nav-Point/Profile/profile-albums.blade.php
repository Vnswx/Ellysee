@extends('Layout.layout')
{{-- @include('Layout.header') --}}
@section('header')
    @include('Layout.header')
@endsection

@section('content')
    <style>
            .row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); /* Ubah 200px sesuai dengan kebutuhan */
        gap: 1rem;
        align-content: start; /* Gambar akan diposisikan mulai dari bagian atas grid */
    }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            grid-gap: 15px;
        }

        .grid-item {
            position: relative;
            overflow: hidden;
        }

        .grid-item img {
            width: 100%;
            height: auto;
            display: block;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            opacity: 0;
            /* Atur opacity ke 0 secara default */
            transition: opacity 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Tambahkan efek hover ke dalam .card */
        .card:hover .overlay {
            opacity: 1;
            /* Ubah opacity menjadi 1 saat hover */
        }

        .overlay p {
            text-align: center;
            margin: 0;
            padding: 10px;
        }

        .pars {
            margin-left: 30px;
            margin-bottom: 20px;
        }

        .card {
            overflow: hidden;
        }

        .card-img-top {
            width: 100%;
            height: auto;
            transition: transform 0.2s ease-in-out;
        }

        .card:hover .card-img-top {
            transform: scale(1.05);
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <div class="container" style="padding-top: 150px">
        <a class="pars" href="{{ route('profile') }}" style="margin-bottom: 20px">Back</a>
        <div class="row mx-auto">
            @if ($photos->isEmpty())
                <div class="col text-center" style="margin-bottom: 21.8vw">
                    <p>Album ini belum memiliki foto.</p>
                </div>
            @else
                @foreach ($photos as $photo)
                    <div class="card position-relative">
                        <a href="{{ route('profile') }}">
                            <img src="{{ Storage::url($photo->lokasifile) }}" class="card-img-top"
                                alt="{{ $photo->judulfoto }}">
                            <div class="overlay position-absolute top-0 start-100 translate-middle-y">
                                {{-- <a href="{{ Storage::url($photo->lokasifile) }}" download>
                                    <i class="fas fa-save"></i>
                                </a> --}}
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    
    


    {{-- <section class="mini" id="work-process">
        <div class="mini-content">
            <div class="container">
                <!-- ***** Mini Box Start ***** -->
                <div class="row">
                    @foreach ($photos as $photo)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="mini-box">
                                <a href="#"><img src="{{ Storage::url($photo->lokasifile) }}" alt=""></a>
                                <div class="content">
                                    <strong>{{ $photo->judulfoto }}</strong>
                                    <span>{{ $photo->deskripsifoto }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- ***** Mini Box End ***** -->
            </div>
        </div>
    </section>     --}}
@endsection

@section('footer')
    @include('Layout.footer')
@endsection
