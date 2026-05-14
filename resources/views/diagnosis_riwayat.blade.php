@extends('app')

@section('title', 'Riwayat Diagnosis')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="bi bi-clock-history"></i> Riwayat Diagnosis</h4>
            </div>
            
            @if ($riwayat->count() > 0)
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pasien</th>
                                    <th>Nama Penyakit</th>
                                    <th>Tanggal Diagnosis</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($riwayat as $item)
                                    <tr>
                                        <td>{{ ($riwayat->currentPage() - 1) * $riwayat->perPage() + $loop->iteration }}</td>
                                        <td><strong>{{ $item->nama_pasien }}</strong></td>
                                        <td>
                                            <span class="badge bg-info">{{ $item->nama_penyakit }}</span>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-muted">
                                            <i class="bi bi-inbox"></i> Belum ada riwayat diagnosis
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if ($riwayat->hasPages())
                        <div class="d-flex justify-content-center mt-4">
                            {{ $riwayat->links('pagination::bootstrap-5') }}
                        </div>
                    @endif
                </div>
            @else
                <div class="card-body text-center py-5">
                    <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                    <h5 class="mt-3 text-muted">Belum Ada Riwayat</h5>
                    <p class="text-muted">Mulai diagnosis untuk melihat riwayatnya di sini</p>
                </div>
            @endif

            <div class="card-footer bg-light">
                <a href="/" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <a href="/diagnosis/kuis" class="btn btn-primary float-end">
                    <i class="bi bi-plus-circle"></i> Diagnosis Baru
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
