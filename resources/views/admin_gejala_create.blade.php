@extends('admin_layout')

@section('title', 'Tambah Gejala')

@section('content')
<div class="page-header">
    <h3><i class="bi bi-plus-circle"></i> Tambah Gejala Baru</h3>
</div>

<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="bi bi-plus-circle"></i> Tambah Gejala Baru</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.gejala.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="kode_gejala" class="form-label">Kode Gejala <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('kode_gejala') is-invalid @enderror" 
                               id="kode_gejala" name="kode_gejala" value="{{ old('kode_gejala') }}" required maxlength="3">
                        @error('kode_gejala')
                            <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                        <small class="form-text text-muted">Contoh: G01, G02, dst (max 3 karakter)</small>
                    </div>

                    <div class="mb-3">
                        <label for="nama_gejala" class="form-label">Nama Gejala <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama_gejala') is-invalid @enderror" 
                               id="nama_gejala" name="nama_gejala" value="{{ old('nama_gejala') }}" required maxlength="100">
                        @error('nama_gejala')
                            <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.gejala.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
