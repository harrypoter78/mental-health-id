@extends('app')

@section('title', 'Kuis Diagnosis Gejala')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="bi bi-clipboard2-check"></i> Kuis Diagnosis Gejala</h4>
            </div>
            <div class="card-body">
                @if (!auth()->check())
                    <div class="alert alert-info mb-4 d-flex align-items-center">
                        <i class="bi bi-info-circle me-2"></i>
                        <p class="mb-0">Anda dapat melakukan diagnosis tanpa login. Untuk menyimpan riwayat diagnosis, silakan <a href="{{ route('login') }}" class="alert-link">login terlebih dahulu</a>.</p>
                    </div>
                @else
                    <div class="mb-4">
                        <label for="nama_user" class="form-label fw-bold">Nama Anda:</label>
                        <input type="text" class="form-control" id="nama_user" disabled value="{{ auth()->user()->name }}">
                        <small class="text-muted">Data diambil dari akun Anda</small>
                    </div>
                @endif

                <form action="/diagnosis/proses" method="POST">
                    @csrf

                    <div class="mb-4">
                        <p class="fw-bold text-muted">
                            <i class="bi bi-info-circle"></i> Silahkan centang gejala yang Anda alami (minimal 1):
                        </p>

                        <div class="row g-3">
                            @foreach ($gejala as $item)
                                <div class="col-md-6">
                                    <div class="form-check p-3 border rounded" style="background: #f8f9fa; cursor: pointer;">
                                        <input class="form-check-input" type="checkbox" name="gejala[]" 
                                               value="{{ $item->kode_gejala }}" id="gejala_{{ $item->id_gejala }}">
                                        <label class="form-check-label w-100" for="gejala_{{ $item->id_gejala }}" style="cursor: pointer;">
                                            <strong>{{ $item->kode_gejala }}</strong> - {{ $item->nama_gejala }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        {{-- <a href="/" class="btn btn-secondary">Batal</a> --}}
                        <a href="/" class="btn btn-secondary d-flex align-items-center justify-content-center">
                            Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-play-fill"></i> Mulai Diagnosis
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.querySelectorAll('.form-check-label').forEach(label => {
        label.addEventListener('click', function() {
            this.closest('.form-check').classList.toggle('bg-light');
        });
    });

    document.querySelectorAll('.form-check-input').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                this.closest('.form-check').parentElement.querySelector('.form-check-label').closest('.form-check').classList.add('bg-light');
            }
        });
    });
</script>
@endsection
