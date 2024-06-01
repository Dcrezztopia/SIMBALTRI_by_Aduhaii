<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanSurat extends Model
{
    use HasFactory;

    protected $table = 'permintaan_surat';
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

    protected $hidden = [
    ];
}
