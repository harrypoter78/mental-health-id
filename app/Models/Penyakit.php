<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    protected $table      = 'penyakit';
    protected $primaryKey = 'id_penyakit';

    protected $fillable = [
        'kode_penyakit', 'nama_penyakit', 'deskripsi', 'solusi_obat', 'solusi_lain'
    ];

    public $timestamps = false;

    /**
     * Ambil semua penyakit, atau satu penyakit berdasarkan id.
     */
    public static function getPenyakit($id_penyakit = false)
    {
        if ($id_penyakit === false) {
            return self::all();
        }

        return self::where('id_penyakit', $id_penyakit)->first();
    }

    public function rules()
    {
        return $this->hasMany(Rule::class, 'kode_penyakit', 'kode_penyakit');
    }
}
