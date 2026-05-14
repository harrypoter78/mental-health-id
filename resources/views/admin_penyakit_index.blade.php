@extends('admin_layout')

@section('title', 'Kelola Penyakit')

@section('content')
<div class="page-header">
    <h3><i class="bi bi-virus2"></i> Kelola Penyakit</h3>
    <a href="{{ route('admin.penyakit.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah
    </a>
</div>

<div class="card">
    <div class="card-body table-responsive">
        @if ($penyakit->count() > 0)
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penyakit as $item)
                        <tr>
                            <td><span class="badge bg-danger">{{ $item->kode_penyakit }}</span></td>
                            <td>{{ $item->nama_penyakit }}</td>
                            <td>
                                <a href="{{ route('admin.penyakit.edit', $item->id_penyakit) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.penyakit.destroy', $item->id_penyakit) }}" method="POST" style="display:inline;">
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
            @if ($penyakit->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $penyakit->links() }}
                </div>
            @endif
        @else
            <div class="alert alert-info">Belum ada data penyakit</div>
        @endif
    </div>
</div>
@endsection
