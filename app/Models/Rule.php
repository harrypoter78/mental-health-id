<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    protected $table      = 'rule';
    protected $primaryKey = 'id_rule';

    protected $fillable = [
        'kode_rule', 'kode_penyakit', 'kode_gejala'
    ];

    public $timestamps = false;

    /**
     * Ambil semua rule, atau satu rule berdasarkan id.
     */
    public static function getRule($id_rule = false)
    {
        if ($id_rule === false) {
            return self::all();
        }

        return self::where('id_rule', $id_rule)->first();
    }

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'kode_penyakit', 'kode_penyakit');
    }

    public function gejala()
    {
        return $this->belongsTo(Gejala::class, 'kode_gejala', 'kode_gejala');
    }
}
