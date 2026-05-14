<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    protected $table      = 'riwayat';
    protected $primaryKey = 'id_riwayat';

    protected $fillable = [
        'nama_pasien', 'nama_penyakit', 'tanggal'
    ];

    public $timestamps = false;

    /**
     * Ambil semua riwayat, atau satu riwayat berdasarkan id.
     */
    public static function getRiwayat($id_riwayat = false)
    {
        if ($id_riwayat === false) {
            return self::all();
        }

        return self::where('id_riwayat', $id_riwayat)->first();
    }
}
