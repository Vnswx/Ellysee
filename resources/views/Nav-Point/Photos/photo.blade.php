@extends('Layout.layout')
{{-- @include('Layout.header') --}}
@section('header')
    @include('Layout.header')
@endsection

@section('content')
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
                                    <div class="form-group">
                                        <label for="lokasifile">Select Images:</label>
                                        <input type="file" name="lokasifile" id="lokasifile" class="form-control-file" required accept="image/*" onchange="previewImage(event)">
                                        <img id="preview" src="#" alt="Preview" style="max-width: 100%; height: auto; display: none;">
                                    </div>
                            </div>

                            <!-- Kolom kanan untuk input lainnya -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="album_id">Pilih Album:</label>
                                    <select name="album_id" id="album_id" class="form-control" required>
                                        <option value="">Pilih Album</option>
                                        @foreach($albums as $album)
                                            <option value="{{ $album->id }}">{{ $album->namaalbum }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Input Judul Foto -->
                                <div class="form-group">
                                    <label for="judulfoto">Photo Title:</label>
                                    <input placeholder="Enter Title" type="text" name="judulfoto" id="judulfoto" class="form-control" required>
                                </div>

                                <!-- Input Deskripsi Foto -->
                                <div class="form-group">
                                    <label for="deskripsifoto">Photo Description:</label>
                                    <input placeholder="Enter Description" type="text" name="deskripsifoto" id="deskripsifoto" class="form-control" required>
                                </div>

                                <!-- Input Kategori -->
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <input type="text" placeholder="Enter Category" name="category" class="form-control" id="category" required>
                                </div>
                            </div>
                        </div>

                        <!-- Preview gambar -->
                           

                        <!-- Tombol Cancel dan Submit -->
                        <div class="text-right">
                            <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ route('profile') }}'">Cancel</button>
                            <button type="submit" class="btn btn-primary">Tambah Foto</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function(){
            var img = document.getElementById('preview');
            img.src = reader.result;
            img.style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }
</script>

@endsection

@section('footer')
    @include('Layout.footer')
@endsection
