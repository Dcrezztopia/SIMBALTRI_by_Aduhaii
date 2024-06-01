<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanSurat extends Model
{
    use HasFactory;
    protected $table = 'permohonan_surat';
    protected $fillable = [
        'nama_pemohon',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'kewarganegaraan',
        'alamat',
        'perihal',
        'tanggal_dibuat',
    ];
    public $timestamps = false;

    protected $hidden = [
    ];
}
