@extends('admin_layout')

@section('title', 'Kelola Rules')

@section('content')
<div class="page-header">
    <h3><i class="bi bi-diagram-3"></i> Kelola Rules</h3>
    <a href="{{ route('admin.rule.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle text-white"></i> Tambah Rule
    </a>
</div>

<div class="card">
    {{-- Pisahkan class card-body dan table-responsive di sini --}}
    <div class="card-body">
        @if ($rule->count() > 0)
            {{-- Buat bungkus div baru khusus untuk table-responsive --}}
            <div class="table-responsive">
                <table class="table table-hover table-sm">
                    <thead class="table-light">
                        <tr>
                            <th>Rule ID</th>
                            <th>Penyakit</th>
                            <th>Gejala</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rule as $item)
                            <tr>
                                <td><span class="badge bg-success">{{ $item->kode_rule }}</span></td>
                                <td>{{ $item->penyakit->nama_penyakit ?? '-' }}</td>
                                <td>{{ $item->gejala->nama_gejala ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('admin.rule.edit', $item->id_rule) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.rule.destroy', $item->id_rule) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> @if ($rule->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $rule->links('pagination::bootstrap-5') }}
                </div>
            @endif
        @else
            <div class="alert alert-info">Belum ada rules</div>
        @endif
    </div>
</div>
@endsection