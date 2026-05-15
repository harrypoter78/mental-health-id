@extends('admin_layout')

@section('title', 'Kelola Gejala')

@section('content')
<div class="page-header">
    <h3><i class="bi bi-heart-pulse"></i> Kelola Gejala</h3>
    <a href="{{ route('admin.gejala.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle text-white"></i> Tambah Gejala
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if ($gejala->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Kode</th>
                            <th>Nama Gejala</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gejala as $item)
                            <tr>
                                <td>{{ $item->id_gejala }}</td>
                                <td><span class="badge bg-info">{{ $item->kode_gejala }}</span></td>
                                <td>{{ $item->nama_gejala }}</td>
                                <td>
                                    <a href="{{ route('admin.gejala.edit', $item->id_gejala) }}" 
                                       class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.gejala.destroy', $item->id_gejala) }}" 
                                          method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" 
                                                onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if ($gejala->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $gejala->links('pagination::bootstrap-5') }}
                </div>
            @endif
        @else
            <div class="alert alert-info">
                Belum ada gejala. <a href="{{ route('admin.gejala.create') }}">Tambah gejala sekarang</a>
            </div>
        @endif
    </div>
</div>
@endsection
