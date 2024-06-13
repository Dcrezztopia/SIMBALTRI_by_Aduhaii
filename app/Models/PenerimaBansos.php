<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaBansos extends Model
{
    use HasFactory;

    protected $table = 'penerima_bansos';
    protected $primaryKey = 'id_penerima';
    public $timestamps = true;
    protected $fillable = [
        'nik',
        'no_kk',
        'id_pengajuan'
    ];

    public function pengajuan()
    {
        return $this->belongsTo(PengajuanBansos::class, 'id_pengajuan');
    }
}
