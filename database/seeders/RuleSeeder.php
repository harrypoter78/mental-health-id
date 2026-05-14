<?php

namespace Database\Seeders;

use App\Models\Rule;
use Illuminate\Database\Seeder;

class RuleSeeder extends Seeder
{
    public function run(): void
    {
        $rulesData = [
            // Depresi Mayor (P01)
            ['kode_rule' => 1, 'kode_penyakit' => 'P01', 'kode_gejala' => 'G01'],
            ['kode_rule' => 2, 'kode_penyakit' => 'P01', 'kode_gejala' => 'G02'],
            ['kode_rule' => 3, 'kode_penyakit' => 'P01', 'kode_gejala' => 'G03'],
            ['kode_rule' => 4, 'kode_penyakit' => 'P01', 'kode_gejala' => 'G04'],
            ['kode_rule' => 5, 'kode_penyakit' => 'P01', 'kode_gejala' => 'G05'],
            ['kode_rule' => 6, 'kode_penyakit' => 'P01', 'kode_gejala' => 'G06'],
            ['kode_rule' => 7, 'kode_penyakit' => 'P01', 'kode_gejala' => 'G07'],
            ['kode_rule' => 8, 'kode_penyakit' => 'P01', 'kode_gejala' => 'G08'],
            ['kode_rule' => 9, 'kode_penyakit' => 'P01', 'kode_gejala' => 'G16'],

            // Gangguan Kecemasan Umum (P02)
            ['kode_rule' => 10, 'kode_penyakit' => 'P02', 'kode_gejala' => 'G09'],
            ['kode_rule' => 11, 'kode_penyakit' => 'P02', 'kode_gejala' => 'G07'],
            ['kode_rule' => 12, 'kode_penyakit' => 'P02', 'kode_gejala' => 'G04'],
            ['kode_rule' => 13, 'kode_penyakit' => 'P02', 'kode_gejala' => 'G05'],
            ['kode_rule' => 14, 'kode_penyakit' => 'P02', 'kode_gejala' => 'G11'],
            ['kode_rule' => 15, 'kode_penyakit' => 'P02', 'kode_gejala' => 'G13'],

            // Gangguan Panik (P03)
            ['kode_rule' => 16, 'kode_penyakit' => 'P03', 'kode_gejala' => 'G10'],
            ['kode_rule' => 17, 'kode_penyakit' => 'P03', 'kode_gejala' => 'G11'],
            ['kode_rule' => 18, 'kode_penyakit' => 'P03', 'kode_gejala' => 'G05'],
            ['kode_rule' => 19, 'kode_penyakit' => 'P03', 'kode_gejala' => 'G12'],
            ['kode_rule' => 20, 'kode_penyakit' => 'P03', 'kode_gejala' => 'G09'],

            // Fobia Sosial (P04)
            ['kode_rule' => 21, 'kode_penyakit' => 'P04', 'kode_gejala' => 'G12'],
            ['kode_rule' => 22, 'kode_penyakit' => 'P04', 'kode_gejala' => 'G09'],
            ['kode_rule' => 23, 'kode_penyakit' => 'P04', 'kode_gejala' => 'G16'],
            ['kode_rule' => 24, 'kode_penyakit' => 'P04', 'kode_gejala' => 'G11'],
            ['kode_rule' => 25, 'kode_penyakit' => 'P04', 'kode_gejala' => 'G06'],

            // Skizofrenia (P05)
            ['kode_rule' => 26, 'kode_penyakit' => 'P05', 'kode_gejala' => 'G14'],
            ['kode_rule' => 27, 'kode_penyakit' => 'P05', 'kode_gejala' => 'G15'],
            ['kode_rule' => 28, 'kode_penyakit' => 'P05', 'kode_gejala' => 'G16'],
            ['kode_rule' => 29, 'kode_penyakit' => 'P05', 'kode_gejala' => 'G18'],
            ['kode_rule' => 30, 'kode_penyakit' => 'P05', 'kode_gejala' => 'G07'],

            // Gangguan Bipolar (P06)
            ['kode_rule' => 31, 'kode_penyakit' => 'P06', 'kode_gejala' => 'G01'],
            ['kode_rule' => 32, 'kode_penyakit' => 'P06', 'kode_gejala' => 'G13'],
            ['kode_rule' => 33, 'kode_penyakit' => 'P06', 'kode_gejala' => 'G18'],
            ['kode_rule' => 34, 'kode_penyakit' => 'P06', 'kode_gejala' => 'G04'],
            ['kode_rule' => 35, 'kode_penyakit' => 'P06', 'kode_gejala' => 'G05'],

            // Gangguan Obsesif Kompulsif (P07)
            ['kode_rule' => 36, 'kode_penyakit' => 'P07', 'kode_gejala' => 'G19'],
            ['kode_rule' => 37, 'kode_penyakit' => 'P07', 'kode_gejala' => 'G20'],
            ['kode_rule' => 38, 'kode_penyakit' => 'P07', 'kode_gejala' => 'G09'],
            ['kode_rule' => 39, 'kode_penyakit' => 'P07', 'kode_gejala' => 'G07'],
            ['kode_rule' => 40, 'kode_penyakit' => 'P07', 'kode_gejala' => 'G06'],

            // PTSD (P08)
            ['kode_rule' => 41, 'kode_penyakit' => 'P08', 'kode_gejala' => 'G12'],
            ['kode_rule' => 42, 'kode_penyakit' => 'P08', 'kode_gejala' => 'G04'],
            ['kode_rule' => 43, 'kode_penyakit' => 'P08', 'kode_gejala' => 'G01'],
            ['kode_rule' => 44, 'kode_penyakit' => 'P08', 'kode_gejala' => 'G09'],
            ['kode_rule' => 45, 'kode_penyakit' => 'P08', 'kode_gejala' => 'G07'],

            // Gangguan Kepribadian (P09)
            ['kode_rule' => 46, 'kode_penyakit' => 'P09', 'kode_gejala' => 'G13'],
            ['kode_rule' => 47, 'kode_penyakit' => 'P09', 'kode_gejala' => 'G16'],
            ['kode_rule' => 48, 'kode_penyakit' => 'P09', 'kode_gejala' => 'G18'],
            ['kode_rule' => 49, 'kode_penyakit' => 'P09', 'kode_gejala' => 'G15'],

            // Gangguan Substansi (P10)
            ['kode_rule' => 50, 'kode_penyakit' => 'P10', 'kode_gejala' => 'G17'],
            ['kode_rule' => 51, 'kode_penyakit' => 'P10', 'kode_gejala' => 'G15'],
            ['kode_rule' => 52, 'kode_penyakit' => 'P10', 'kode_gejala' => 'G04'],
            ['kode_rule' => 53, 'kode_penyakit' => 'P10', 'kode_gejala' => 'G18'],
        ];

        foreach ($rulesData as $rule) {
            Rule::create($rule);
        }
    }
}
