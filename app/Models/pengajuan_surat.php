<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengajuan_surat extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_surat'; 
    protected $primaryKey = 'id_surat'; 

    public $timestamps = true;

    protected $fillable = [
        'nama',
        'tanggal_lahir',
        'kewarganegaraan',
        'pekerjaan',
        'alamat_rumah', 
        'kepentingan',
        'perihal',
    ];
}
