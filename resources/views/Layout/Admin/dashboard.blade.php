ini halaman dashboard admin
tipe Pelanggaran
{{ $violationTypes }}
<a href="{{ route('violation-index') }}">Violations</a>

@foreach ($reports as $report)
    <div class="card mb-3">
        @php
            $encryptedPhotoId = encrypt($report->photo_id);
        @endphp
        <div class="card-body">
            <h5 class="card-title">Laporan ID: {{ $report->id }}</h5>
            <p class="card-text">Foto ID: {{ $report->photo_id }}</p>
            <p class="card-text">Alasan Pelaporan: {{ $report->reason }}</p>
            <p class="card-text">Jenis Pelanggaran: {{ $report->violationTypes->name }}</p>
            <!-- Tampilkan informasi tambahan sesuai kebutuhan -->
            <a href="{{ route('detail', $encryptedPhotoId) }}" class="btn btn-primary">Lihat Foto</a>
            <form action="{{ route('report-approve', $report) }}" method="POST">
                @csrf
                @method('POST')
                <button type="submit" class="btn btn-success">Terima</button>
            </form>
            <form action="{{ route('report-reject', $report) }}" method="POST">
                @csrf
                @method('POST')
                <button type="submit" class="btn btn-danger">Tolak</button>
            </form>
        </div>
    </div>
@endforeach
