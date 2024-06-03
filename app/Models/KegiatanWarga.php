<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanWarga extends Model
{
    use HasFactory;

    protected $table = 'kegiatan_warga';
    protected $primaryKey = 'id_kegiatan';
    
    protected $fillable = [
        'nama_kegiatan',
        'tanggal_pelaksanaan',
        'tempat_pelaksanaan',
        'penanggung_jawab',
    ];
}
