<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    protected $table      = 'gejala';
    protected $primaryKey = 'id_gejala';

    protected $fillable = [
        'kode_gejala', 'nama_gejala'
    ];

    public $timestamps = false;

    /**
     * Ambil semua gejala, atau satu gejala berdasarkan id.
     */
    public static function getGejala($id_gejala = false)
    {
        if ($id_gejala === false) {
            return self::all();
        }

        return self::where('id_gejala', $id_gejala)->first();
    }

    public function rules()
    {
        return $this->hasMany(Rule::class, 'kode_gejala', 'kode_gejala');
    }
}
