<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\Rule;
use App\Models\Riwayat;
use Illuminate\Http\Request;

class DiagnosisController extends Controller
{
    /**
     * Halaman utama diagnosis
     */
    public function index()
    {
        return view('diagnosis_index');
    }

    /**
     * Tampilkan kuis gejala
     */
    public function kuis()
    {
        $gejala = Gejala::orderBy('id_gejala')->get();
        return view('diagnosis_kuis', compact('gejala'));
    }

    /**
     * Proses diagnosis berdasarkan gejala yang dipilih
     */
    public function prosesDiagnosis(Request $request)
    {
        $request->validate([
            'gejala' => 'required|array|min:1',
            'nama_pasien' => 'required|string|max:100',
        ]);

        $gejalaTerpilih = $request->input('gejala');
        $namaPasien = $request->input('nama_pasien');

        // Ambil semua penyakit
        $semuaPenyakit = Penyakit::all();
        $hasilDiagnosis = [];

        foreach ($semuaPenyakit as $penyakit) {
            // Ambil rules untuk penyakit ini
            $rules = Rule::where('kode_penyakit', $penyakit->kode_penyakit)->get();

            if ($rules->isEmpty()) {
                continue;
            }

            // Hitung berapa gejala dari penyakit ini yang cocok
            $gejalaPenyakit = $rules->pluck('kode_gejala')->toArray();
            $cocok = 0;
            $total = count($gejalaPenyakit);

            foreach ($gejalaTerpilih as $kodeGejala) {
                if (in_array($kodeGejala, $gejalaPenyakit)) {
                    $cocok++;
                }
            }

            // Hitung persentase
            $persentase = ($total > 0) ? round(($cocok / $total) * 100, 2) : 0;

            if ($persentase > 0) {
                $hasilDiagnosis[] = [
                    'penyakit' => $penyakit,
                    'persentase' => $persentase,
                    'cocok' => $cocok,
                    'total' => $total,
                ];
            }
        }

        // Urutkan hasil berdasarkan persentase tertinggi
        usort($hasilDiagnosis, function ($a, $b) {
            return $b['persentase'] <=> $a['persentase'];
        });

        // Ambil diagnosis tertinggi
        $diagnosisTertinggi = !empty($hasilDiagnosis) ? $hasilDiagnosis[0] : null;

        // Simpan riwayat
        if ($diagnosisTertinggi) {
            Riwayat::create([
                'nama_pasien' => $namaPasien,
                'nama_penyakit' => $diagnosisTertinggi['penyakit']->nama_penyakit,
                'tanggal' => now()->toDateString(),
            ]);
        }

        return view('diagnosis_hasil', [
            'namaPasien' => $namaPasien,
            'diagnosisTertinggi' => $diagnosisTertinggi,
            'hasilDiagnosis' => $hasilDiagnosis,
        ]);
    }

    /**
     * Lihat riwayat diagnosis
     */
    public function riwayat()
    {
        $riwayat = Riwayat::orderBy('tanggal', 'desc')->paginate(10);
        return view('diagnosis_riwayat', compact('riwayat'));
    }
}
