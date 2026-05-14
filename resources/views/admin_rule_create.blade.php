@extends('admin_layout')

@section('title', 'Tambah Rule')

@section('content')
<div class="page-header">
    <h3><i class="bi bi-plus-circle"></i> Tambah Rule</h3>
</div>

<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="bi bi-plus-circle"></i> Tambah Rule</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.rule.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="kode_rule" class="form-label">Kode Rule <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('kode_rule') is-invalid @enderror" 
                               id="kode_rule" name="kode_rule" value="{{ old('kode_rule') }}" required>
                        @error('kode_rule')<small class="invalid-feedback">{{ $message }}</small>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="kode_penyakit" class="form-label">Penyakit <span class="text-danger">*</span></label>
                        <select class="form-select @error('kode_penyakit') is-invalid @enderror" 
                                id="kode_penyakit" name="kode_penyakit" required>
                            <option value="">-- Pilih Penyakit --</option>
                            @foreach ($penyakit as $item)
                                <option value="{{ $item->kode_penyakit }}" {{ old('kode_penyakit') == $item->kode_penyakit ? 'selected' : '' }}>
                                    {{ $item->nama_penyakit }}
                                </option>
                            @endforeach
                        </select>
                        @error('kode_penyakit')<small class="invalid-feedback">{{ $message }}</small>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="kode_gejala" class="form-label">Gejala <span class="text-danger">*</span></label>
                        <select class="form-select @error('kode_gejala') is-invalid @enderror" 
                                id="kode_gejala" name="kode_gejala" required>
                            <option value="">-- Pilih Gejala --</option>
                            @foreach ($gejala as $item)
                                <option value="{{ $item->kode_gejala }}" {{ old('kode_gejala') == $item->kode_gejala ? 'selected' : '' }}>
                                    {{ $item->nama_gejala }}
                                </option>
                            @endforeach
                        </select>
                        @error('kode_gejala')<small class="invalid-feedback">{{ $message }}</small>@enderror
                    </div>

                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.rule.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
