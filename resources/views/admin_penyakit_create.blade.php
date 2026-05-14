@extends('app')

@section('title', 'Tambah Penyakit')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="bi bi-plus-circle"></i> Tambah Penyakit</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.penyakit.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="kode_penyakit" class="form-label">Kode Penyakit <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('kode_penyakit') is-invalid @enderror" 
                                   id="kode_penyakit" name="kode_penyakit" value="{{ old('kode_penyakit') }}" required maxlength="3">
                            @error('kode_penyakit')<small class="invalid-feedback">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nama_penyakit" class="form-label">Nama Penyakit <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nama_penyakit') is-invalid @enderror" 
                                   id="nama_penyakit" name="nama_penyakit" value="{{ old('nama_penyakit') }}" required maxlength="50">
                            @error('nama_penyakit')<small class="invalid-feedback">{{ $message }}</small>@enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="solusi_obat" class="form-label">Solusi Obat-obatan</label>
                        <textarea class="form-control" id="solusi_obat" name="solusi_obat" rows="2">{{ old('solusi_obat') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="solusi_lain" class="form-label">Solusi Lainnya</label>
                        <textarea class="form-control" id="solusi_lain" name="solusi_lain" rows="2">{{ old('solusi_lain') }}</textarea>
                    </div>

                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.penyakit.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
