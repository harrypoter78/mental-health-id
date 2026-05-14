@extends('admin_layout')

@section('title', 'Edit Rule')

@section('content')
<div class="page-header">
    <h3><i class="bi bi-pencil"></i> Edit Rule</h3>
</div>

<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0"><i class="bi bi-pencil"></i> Edit Rule</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.rule.update', $rule->id_rule) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="kode_rule" class="form-label">Kode Rule</label>
                        <input type="number" class="form-control" id="kode_rule" name="kode_rule" 
                               value="{{ old('kode_rule', $rule->kode_rule) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="kode_penyakit" class="form-label">Penyakit</label>
                        <select class="form-select" id="kode_penyakit" name="kode_penyakit" required>
                            <option value="">-- Pilih Penyakit --</option>
                            @foreach ($penyakit as $item)
                                <option value="{{ $item->kode_penyakit }}" {{ old('kode_penyakit', $rule->kode_penyakit) == $item->kode_penyakit ? 'selected' : '' }}>
                                    {{ $item->nama_penyakit }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="kode_gejala" class="form-label">Gejala</label>
                        <select class="form-select" id="kode_gejala" name="kode_gejala" required>
                            <option value="">-- Pilih Gejala --</option>
                            @foreach ($gejala as $item)
                                <option value="{{ $item->kode_gejala }}" {{ old('kode_gejala', $rule->kode_gejala) == $item->kode_gejala ? 'selected' : '' }}>
                                    {{ $item->nama_gejala }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.rule.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
