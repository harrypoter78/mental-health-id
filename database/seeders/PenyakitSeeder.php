<?php

namespace Database\Seeders;

use App\Models\Penyakit;
use Illuminate\Database\Seeder;

class PenyakitSeeder extends Seeder
{
    public function run(): void
    {
        $penyakitData = [
            [
                'kode_penyakit' => 'P01',
                'nama_penyakit' => 'Depresi Mayor',
                'deskripsi' => 'Gangguan mental yang ditandai dengan suasana hati rendah yang persisten dan kehilangan minat atau kesenangan dalam aktivitas.',
                'solusi_obat' => 'Antidepresan (SSRI, SNRI), Konsultasi dengan psikiatri',
                'solusi_lain' => 'Psikoterapi, Aktivitas fisik, Dukungan sosial, Istirahat yang cukup',
            ],
            [
                'kode_penyakit' => 'P02',
                'nama_penyakit' => 'Gangguan Kecemasan Umum',
                'deskripsi' => 'Kecemasan berlebihan tentang berbagai aspek kehidupan sehari-hari yang sulit dikendalikan.',
                'solusi_obat' => 'Anti-kecemasan (benzodiazepine), Antidepresan',
                'solusi_lain' => 'Terapi kognitif perilaku, Relaksasi, Meditasi, Olahraga teratur',
            ],
            [
                'kode_penyakit' => 'P03',
                'nama_penyakit' => 'Gangguan Panik',
                'deskripsi' => 'Episode panik tiba-tiba dengan gejala fisik yang menakutkan tanpa ancaman nyata.',
                'solusi_obat' => 'Antidepresan SSRI, Anti-panik',
                'solusi_lain' => 'Terapi eksposur, Teknik pernapasan, Konseling',
            ],
            [
                'kode_penyakit' => 'P04',
                'nama_penyakit' => 'Fobia Sosial',
                'deskripsi' => 'Rasa takut intens terhadap situasi sosial dan menghindari interaksi dengan orang lain.',
                'solusi_obat' => 'Antidepresan SSRI, Beta-blocker untuk gejala fisik',
                'solusi_lain' => 'Terapi perilaku kognitif, Pelatihan keterampilan sosial, Desensitisasi bertahap',
            ],
            [
                'kode_penyakit' => 'P05',
                'nama_penyakit' => 'Skizofrenia',
                'deskripsi' => 'Gangguan mental serius dengan gejala seperti delusi, halusinasi, dan pemikiran yang tidak terorganisir.',
                'solusi_obat' => 'Antipsikotik (tipikal atau atipikal), Konsultasi psikiatri segera',
                'solusi_lain' => 'Rehabilitasi psikososial, Dukungan keluarga, Program pelatihan kerja',
            ],
            [
                'kode_penyakit' => 'P06',
                'nama_penyakit' => 'Gangguan Bipolar',
                'deskripsi' => 'Gangguan mood dengan episode manik dan depresi yang bergantian.',
                'solusi_obat' => 'Penstabil mood (lithium, antikonvulsan), Antipsikotik',
                'solusi_lain' => 'Psikoterapi, Manajemen stress, Pola tidur teratur, Dukungan sosial',
            ],
            [
                'kode_penyakit' => 'P07',
                'nama_penyakit' => 'Gangguan Obsesif Kompulsif',
                'deskripsi' => 'Obsesi (pikiran berulang) dan kompulsi (tindakan berulang) yang mengganggu kehidupan sehari-hari.',
                'solusi_obat' => 'Antidepresan SSRI dosis tinggi',
                'solusi_lain' => 'Terapi paparan dan pencegahan respons, Terapi kognitif perilaku',
            ],
            [
                'kode_penyakit' => 'P08',
                'nama_penyakit' => 'PTSD (Gangguan Stress Pasca Trauma)',
                'deskripsi' => 'Respons terhadap pengalaman traumatis dengan gejala flashback, mimpi buruk, dan menghindari pemicu.',
                'solusi_obat' => 'Antidepresan SSRI, Anti-anxiety',
                'solusi_lain' => 'Terapi trauma berfokus, Desensitisasi sistematis, Dukungan kelompok',
            ],
            [
                'kode_penyakit' => 'P09',
                'nama_penyakit' => 'Gangguan Kepribadian',
                'deskripsi' => 'Pola perilaku dan pemikiran yang tidak fleksibel dan mengganggu hubungan atau fungsi sosial.',
                'solusi_obat' => 'Terapi obat untuk gejala spesifik sesuai kebutuhan',
                'solusi_lain' => 'Psikoterapi jangka panjang, Terapi kelompok, Manajemen emosi',
            ],
            [
                'kode_penyakit' => 'P10',
                'nama_penyakit' => 'Gangguan Substansi',
                'deskripsi' => 'Ketergantungan atau penyalahgunaan zat yang mempengaruhi kehidupan sehari-hari.',
                'solusi_obat' => 'Obat pengganti, Obat penghilang gejala putus zat',
                'solusi_lain' => 'Program rehabilitasi, Terapi kelompok, Dukungan keluarga, Kamp pemulihan',
            ],
        ];

        foreach ($penyakitData as $penyakit) {
            Penyakit::create($penyakit);
        }
    }
}
