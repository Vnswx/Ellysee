@extends('Layout.layout')
{{-- @include('Layout.header') --}}
@section('header')
    @include('Layout.header')
@endsection

@section('content')
    <style>
        .image-upload-wrap {
            height: 310px;
            margin-top: 20px;
            border: 4px dashed #1FB264;
            position: relative;
        }

        .image-dropping,
        .image-upload-wrap:hover {
            background-color: #1FB264;
            border: 4px dashed #ffffff;
        }

        .image-title-wrap {
            padding: 0 15px 15px 15px;
            color: #222;
        }

        .drag-text {
            text-align: center;
            font-size: 12px;
            margin-top: 10vw;
            padding: 10px;
        }

        .drag-text h3 {
            font-weight: 100;
            text-transform: uppercase;
            color: #15824B;
            padding: 60px 0;
        }

        .file-upload-input {
            position: absolute;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            outline: none;
            opacity: 0;
            cursor: pointer;
        }

        .file-upload-image {
            max-height: 200px;
            max-width: 200px;
            margin: auto;
            padding: 20px;
        }

        .remove-image {
            width: 200px;
            margin: 0;
            color: #fff;
            background: #cd4535;
            border: none;
            padding: 10px;
            border-radius: 4px;
            border-bottom: 4px solid #b02818;
            transition: all .2s ease;
            outline: none;
            text-transform: uppercase;
            font-weight: 700;
        }

        .remove-image:hover {
            background: #c13b2a;
            color: #ffffff;
            transition: all .2s ease;
            cursor: pointer;
        }

        .remove-image:active {
            border: 0;
            transition: all .2s ease;
        }
    </style>
    <form method="POST" action="{{ route('photos-create') }}" enctype="multipart/form-data">
        @csrf

        <div class="container" style="margin-bottom: 150px; margin-top: 150px">
            <div class="row justify-content-center mt-5">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Tambah Foto</h5>

                            <div class="row">
                                <!-- Kolom kiri untuk input gambar -->
                                <div class="col-md-6">
                                    <div class="image-upload-wrap">
                                        <input class="file-upload-input" name="lokasifile" type='file'
                                            onchange="readURL(this);" accept="image/*" />
                                        <div class="drag-text">
                                            <p>Drag and drop a file or click this to add Image</p>
                                        </div>
                                    </div>
                                    <div class="file-upload-content">
                                        <img class="file-upload-image" src="#" alt="your image" />
                                        <div class="image-title-wrap">
                                            <button type="button" onclick="removeUpload()" class="remove-image">Remove
                                                <span class="image-title">Uploaded Image</span></button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Kolom kanan untuk input lainnya -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="album_id">Pilih Album:</label>
                                        <select name="album_id" id="album_id" class="form-control" required>
                                            <option value="">Pilih Album</option>
                                            @foreach ($albums as $album)
                                                <option value="{{ $album->id }}">{{ $album->namaalbum }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Input Judul Foto -->
                                    <div class="form-group">
                                        <label for="judulfoto">Photo Title:</label>
                                        <input placeholder="Enter Title" type="text" name="judulfoto" id="judulfoto"
                                            class="form-control" required>
                                    </div>

                                    <!-- Input Deskripsi Foto -->
                                    <div class="form-group">
                                        <label for="deskripsifoto">Photo Description:</label>
                                        <input placeholder="Enter Description" type="text" name="deskripsifoto"
                                            id="deskripsifoto" class="form-control" required>
                                    </div>

                                    <!-- Input Kategori -->
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <input type="text" placeholder="Enter Category" name="category"
                                            class="form-control" id="category" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Preview gambar -->


                            <!-- Tombol Cancel dan Submit -->
                            <div class="text-right">
                                <button type="button" class="btn btn-secondary"
                                    onclick="window.location.href='{{ route('profile') }}'">Cancel</button>
                                <button type="submit" class="btn btn-primary">Tambah Foto</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        $(document).ready(function() {
            $('.file-upload-content').hide();

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('.image-upload-wrap').hide();
                        $('.file-upload-image').attr('src', e.target.result);
                        $('.image-title').html(input.files[0].name);
                        $('.file-upload-content')
                            .show(); // Menampilkan .file-upload-content setelah gambar dipilih
                    };

                    reader.readAsDataURL(input.files[0]);
                } else {
                    removeUpload();
                }
            }


            $('.image-upload-wrap').bind('dragover', function() {
                $('.image-upload-wrap').addClass('image-dropping');
            });
            $('.image-upload-wrap').bind('dragleave', function() {
                $('.image-upload-wrap').removeClass('image-dropping');
            });
            $('.file-upload-input').on('change', function() {
                readURL(this);
            });
        });

        function removeUpload() {
            $('.file-upload-input').replaceWith($('.file-upload-input').clone());
            $('.file-upload-content').hide();
            $('.image-upload-wrap').show();
        }
    </script>
@endsection

@section('footer')
    @include('Layout.footer')
@endsection
