<form action="{{ route('violation-store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Nama Jenis Pelanggaran:</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Tambahkan Jenis Pelanggaran</button>
</form>
