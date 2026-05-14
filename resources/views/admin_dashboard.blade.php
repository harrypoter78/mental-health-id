@extends('admin_layout')

@section('title', 'Admin Dashboard')

@section('content')
<div class="page-header">
    <h3><i class="bi bi-speedometer2"></i> Dashboard Admin</h3>
</div>

<div class="row g-4 mb-5">
    <div class="col-md-6 col-lg-3">
        <div class="card text-white" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title mb-0">Total Gejala</h6>
                        <h3 class="mt-2 mb-0">{{ $totalGejala }}</h3>
                    </div>
                    <i class="bi bi-heart-pulse" style="font-size: 2rem; opacity: 0.5;"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card text-white" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title mb-0">Total Penyakit</h6>
                        <h3 class="mt-2 mb-0">{{ $totalPenyakit }}</h3>
                    </div>
                    <i class="bi bi-virus2" style="font-size: 2rem; opacity: 0.5;"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card text-white" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title mb-0">Total Rules</h6>
                        <h3 class="mt-2 mb-0">{{ $totalRule }}</h3>
                    </div>
                    <i class="bi bi-diagram-3" style="font-size: 2rem; opacity: 0.5;"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card text-white" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title mb-0">Riwayat Diagnosis</h6>
                        <h3 class="mt-2 mb-0">{{ $totalRiwayat }}</h3>
                    </div>
                    <i class="bi bi-clipboard-check" style="font-size: 2rem; opacity: 0.5;"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-light">
                <h5 class="mb-0"><i class="bi bi-list"></i> Menu Master Data</h5>
            </div>
            <div class="card-body">
                <a href="{{ route('admin.gejala.index') }}" class="btn btn-outline-primary btn-block mb-2 w-100 text-start">
                    <i class="bi bi-heart-pulse"></i> Kelola Gejala
                </a>
                <a href="{{ route('admin.penyakit.index') }}" class="btn btn-outline-primary btn-block mb-2 w-100 text-start">
                    <i class="bi bi-virus2"></i> Kelola Penyakit
                </a>
                <a href="{{ route('admin.rule.index') }}" class="btn btn-outline-primary btn-block mb-2 w-100 text-start">
                    <i class="bi bi-diagram-3"></i> Kelola Rules
                </a>
                <a href="{{ route('admin.riwayat.index') }}" class="btn btn-outline-primary btn-block w-100 text-start">
                    <i class="bi bi-clipboard-check"></i> Lihat Riwayat
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-light">
                <h5 class="mb-0"><i class="bi bi-info-circle"></i> Informasi Sistem</h5>
            </div>
            <div class="card-body">
                <p class="mb-2">
                    <strong>Nama Sistem:</strong><br>
                    <span class="badge bg-primary">Expert System Diagnosis Kesehatan Mental</span>
                </p>
                <p class="mb-2">
                    <strong>Metode Diagnosis:</strong><br>
                    <span class="badge bg-info">Backward Chaining dengan Similarity Matching</span>
                </p>
                <p class="mb-2">
                    <strong>Total Data:</strong><br>
                    {{ $totalGejala }} Gejala + {{ $totalPenyakit }} Penyakit + {{ $totalRule }} Rules
                </p>
                <p class="mb-0">
                    <strong>Status:</strong><br>
                    <span class="badge bg-success">
                        <i class="bi bi-circle-fill"></i> Aktif
                    </span>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
