<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelaporan extends Model
{
    use HasFactory;

    protected $table = 'pelaporan';
    protected $primaryKey = 'id_pelaporan';
    public $timestamps = true;

    protected $fillable = [
        'nama',
        'tanggal_lahir',
        'jenis_kelamin',
        'kewarganegaraan',
        'alamat_rumah',
        'perihal',
        'isi',
        'foto_bukti',
        'tanggal_dibuat',
        'id_pembuat',
    ];
}
