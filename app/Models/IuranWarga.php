<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IuranWarga extends Model
{
    use HasFactory;

    protected $table = 'iuran_warga';
    protected $primaryKey = 'id_iuran';
    protected $fillable = [
        'id_kegiatan',
        'periode',
        'interval',
        'penanggung_jawab',
        'total',
    ];

    public function kegiatan()
    {
        return $this->belongsTo(KegiatanWarga::class, 'id_kegiatan');
    }
    public function warga()
    {
        return $this->belongsTo(DataWarga::class, 'penanggung_jawab', 'nik');
    }
}
