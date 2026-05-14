@extends('app')

@section('title', 'Edit Gejala')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0"><i class="bi bi-pencil"></i> Edit Gejala</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.gejala.update', $gejala->id_gejala) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="kode_gejala" class="form-label">Kode Gejala <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('kode_gejala') is-invalid @enderror" 
                               id="kode_gejala" name="kode_gejala" value="{{ old('kode_gejala', $gejala->kode_gejala) }}" required maxlength="3">
                        @error('kode_gejala')
                            <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama_gejala" class="form-label">Nama Gejala <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama_gejala') is-invalid @enderror" 
                               id="nama_gejala" name="nama_gejala" value="{{ old('nama_gejala', $gejala->nama_gejala) }}" required maxlength="100">
                        @error('nama_gejala')
                            <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.gejala.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-warning">
                            <i class="bi bi-check-circle"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
