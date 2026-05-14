@extends('app')

@section('title', 'Hasil Diagnosis')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        @if ($diagnosisTertinggi)
            <div class="card mb-4 border-success">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0"><i class="bi bi-check-circle"></i> Hasil Diagnosis</h4>
                </div>
                <div class="card-body">
                    <h5>Halo, <strong>{{ $namaPasien }}</strong></h5>
                    <hr>
                    
                    <div class="alert alert-warning" role="alert">
                        <i class="bi bi-exclamation-triangle"></i> 
                        <strong>Penting!</strong> Hasil ini hanya untuk informasi awal. 
                        Segera konsultasikan dengan profesional kesehatan mental untuk diagnosis yang akurat.
                    </div>

                    <h6 class="text-success fw-bold mb-3">
                        <i class="bi bi-arrow-right-circle-fill"></i> Diagnosis Utama:
                    </h6>
                    <div class="card bg-light border-success mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4 class="text-success">{{ $diagnosisTertinggi['penyakit']->nama_penyakit }}</h4>
                                    <p class="text-muted mb-2">
                                        <i class="bi bi-code-square"></i> Kode: <strong>{{ $diagnosisTertinggi['penyakit']->kode_penyakit }}</strong>
                                    </p>
                                    <p class="mb-0">{{ $diagnosisTertinggi['penyakit']->deskripsi }}</p>
                                </div>
                                <div class="col-md-4 text-end">
                                    <div class="display-4 text-success fw-bold">
                                        {{ $diagnosisTertinggi['persentase'] }}%
                                    </div>
                                    <p class="text-muted">Tingkat Kecocokan</p>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="fw-bold">Solusi Obat-obatan:</h6>
                                    <p>{{ $diagnosisTertinggi['penyakit']->solusi_obat ?? 'Konsultasikan dengan dokter' }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="fw-bold">Solusi Lainnya:</h6>
                                    <p>{{ $diagnosisTertinggi['penyakit']->solusi_lain ?? 'Konsultasikan dengan profesional' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if (count($hasilDiagnosis) > 1)
                <div class="card mb-4">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0"><i class="bi bi-graph-up"></i> Hasil Diagnosis Lainnya</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Penyakit</th>
                                        <th>Keterangan</th>
                                        <th>Kecocokan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hasilDiagnosis as $hasil)
                                        @if ($loop->index > 0)
                                            <tr>
                                                <td>
                                                    <strong>{{ $hasil['penyakit']->nama_penyakit }}</strong><br>
                                                    <small class="text-muted">{{ $hasil['penyakit']->kode_penyakit }}</small>
                                                </td>
                                                <td>{{ $hasil['penyakit']->deskripsi }}</td>
                                                <td>
                                                    <span class="badge bg-warning text-dark">
                                                        {{ $hasil['persentase'] }}% ({{ $hasil['cocok'] }}/{{ $hasil['total'] }})
                                                    </span>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        @else
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-circle"></i> 
                <strong>Tidak Ada Diagnosis!</strong> Gejala yang Anda pilih tidak sesuai dengan data yang tersedia dalam sistem.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="d-grid gap-2 d-md-flex justify-content-md-between mt-4">
            <a href="/" class="btn btn-outline-secondary">
                <i class="bi bi-house"></i> Kembali ke Beranda
            </a>
            <a href="/diagnosis/kuis" class="btn btn-primary">
                <i class="bi bi-arrow-repeat"></i> Diagnosis Ulang
            </a>
        </div>
    </div>
</div>
@endsection
