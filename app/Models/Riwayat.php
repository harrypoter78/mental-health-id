<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    protected $table      = 'riwayat';
    protected $primaryKey = 'id_riwayat';

    protected $fillable = [
        'user_id', 'nama_penyakit', 'tanggal'
    ];

    public $timestamps = false;

    /**
     * Relationship: Riwayat belongs to User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

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
