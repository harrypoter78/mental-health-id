<?php

namespace Database\Seeders;

use App\Models\Gejala;
use Illuminate\Database\Seeder;

class GejalaSeeder extends Seeder
{
    public function run(): void
    {
        $gejalaData = [
            ['kode_gejala' => 'G01', 'nama_gejala' => 'Merasa sedih berkepanjangan'],
            ['kode_gejala' => 'G02', 'nama_gejala' => 'Kehilangan minat pada aktivitas yang disukai'],
            ['kode_gejala' => 'G03', 'nama_gejala' => 'Perubahan nafsu makan'],
            ['kode_gejala' => 'G04', 'nama_gejala' => 'Gangguan tidur atau tidur berlebihan'],
            ['kode_gejala' => 'G05', 'nama_gejala' => 'Kelelahan atau kurang energi'],
            ['kode_gejala' => 'G06', 'nama_gejala' => 'Perasaan tidak berharga atau bersalah'],
            ['kode_gejala' => 'G07', 'nama_gejala' => 'Kesulitan konsentrasi'],
            ['kode_gejala' => 'G08', 'nama_gejala' => 'Pikiran tentang kematian atau bunuh diri'],
            ['kode_gejala' => 'G09', 'nama_gejala' => 'Kecemasan berlebihan'],
            ['kode_gejala' => 'G10', 'nama_gejala' => 'Panik atau takut tiba-tiba'],
            ['kode_gejala' => 'G11', 'nama_gejala' => 'Jantung berdebar atau sesak napas'],
            ['kode_gejala' => 'G12', 'nama_gejala' => 'Menghindari situasi tertentu'],
            ['kode_gejala' => 'G13', 'nama_gejala' => 'Agresi atau ledakan emosi'],
            ['kode_gejala' => 'G14', 'nama_gejala' => 'Halusinasi atau delusi'],
            ['kode_gejala' => 'G15', 'nama_gejala' => 'Perilaku tidak teratur atau tidak rasional'],
            ['kode_gejala' => 'G16', 'nama_gejala' => 'Isolasi diri dari orang lain'],
            ['kode_gejala' => 'G17', 'nama_gejala' => 'Penyalahgunaan zat'],
            ['kode_gejala' => 'G18', 'nama_gejala' => 'Perubahan kepribadian drastis'],
            ['kode_gejala' => 'G19', 'nama_gejala' => 'Obsesi atau pikiran berulang'],
            ['kode_gejala' => 'G20', 'nama_gejala' => 'Perilaku kompulsif atau repetitif'],
        ];

        foreach ($gejalaData as $gejala) {
            Gejala::create($gejala);
        }
    }
}
