@extends('app')

@section('title', 'Sistem Diagnosis Kesehatan Mental')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-body text-center py-5">
                <i class="bi bi-heart-pulse" style="font-size: 4rem; color: #e83e8c;"></i>
                <h1 class="card-title mt-3">Sistem Diagnosis Kesehatan Mental</h1>
                <p class="card-text text-muted">
                    Sistem ini dirancang untuk membantu Anda mendapatkan informasi awal tentang kondisi kesehatan mental
                    berdasarkan gejala yang Anda alami.
                </p>
                <div class="alert alert-info mt-4">
                    <i class="bi bi-info-circle"></i> <strong>Penting:</strong> Sistem ini bukan pengganti konsultasi dengan profesional kesehatan mental. 
                    Jika Anda mengalami gejala serius, segera konsultasikan dengan psikiatri atau psikolog.
                </div>
            </div>
        </div>

        <div class="card text-center mb-5">
            <div class="card-body">
                <i class="bi bi-clipboard2-pulse" style="font-size: 2.5rem; color: #6f42c1;"></i>
                <h5 class="card-title mt-3">Mulai Diagnosis</h5>
                <p class="card-text text-muted small">Jawab pertanyaan tentang gejala yang Anda alami</p>
                <a href="/diagnosis/kuis" class="btn btn-primary btn-sm">Mulai <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>

        <div class="card">
            <div class="card">
                <div class="card-header bg-light">
                    <h6 class="mb-0"><i class="bi bi-question-circle"></i> Bagaimana Cara Kerjanya?</h6>
                </div>
                <div class="card-body">
                    <ol class="small mb-0">
                        <li><strong>Isi Data Pribadi:</strong> Masukkan nama Anda untuk identifikasi.</li>
                        <li><strong>Pilih Gejala:</strong> Centang gejala-gejala yang Anda alami.</li>
                        <li><strong>Dapatkan Hasil:</strong> Sistem akan menganalisis dan memberikan diagnosis berdasarkan expert system rules.</li>
                        <li><strong>Konsultasi:</strong> Konsultasikan hasil dengan profesional kesehatan mental yang berpengalaman.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
