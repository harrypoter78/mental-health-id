@extends('app')

@section('title', 'Riwayat Diagnosis')

@section('content')
<div class="row mb-3">
    <div class="col-lg-12">
        <h3><i class="bi bi-clipboard-check"></i> Riwayat Diagnosis Pasien</h3>
    </div>
</div>

<div class="card">
    {{-- Pisahkan class card-body dan table-responsive di sini --}}
    <div class="card-body">
        @if ($riwayat->count() > 0)
            {{-- Buat bungkus div baru khusus untuk table-responsive --}}
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>Penyakit</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($riwayat as $item)
                            <tr>
                                <td>{{ ($riwayat->currentPage() - 1) * $riwayat->perPage() + $loop->iteration }}</td>
                                <td>{{ $item->nama_pasien }}</td>
                                <td><span class="badge bg-info">{{ $item->nama_penyakit }}</span></td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                                <td>
                                    <form action="{{ route('admin.riwayat.destroy', $item->id_riwayat) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> @if ($riwayat->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{-- Tambahkan parameter bootstrap-5 agar ikonnya kembali normal --}}
                    {{ $riwayat->links('pagination::bootstrap-5') }}
                </div>
            @endif
        @else
            <div class="alert alert-info">Belum ada riwayat diagnosis</div>
        @endif
    </div>
</div>
@endsection