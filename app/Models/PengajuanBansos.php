<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanBansos extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_bansos';
    protected $fillable = [
        'nama',
        'nik',
        'no_kk',
        'kondisi_rumah',
        'luas_rumah',
        'status_pernikahan',
        'pekerjaan',
        'jml_tanggungan',
        'jml_pendapatan',
        'tag_listrik',
        'tag_air',
    ];

    public function dataWarga()
    {
        return $this->belongsTo(DataWarga::class, 'nik', 'nik');
    }
}
