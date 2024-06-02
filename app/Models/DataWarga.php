<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataWarga extends Model
{
    use HasFactory;

    protected $table = 'data_warga';
    protected $primaryKey = 'nik';
    public $incrementing = false; // Karena primary key bukan tipe auto increment
    protected $keyType = 'string'; // Karena primary key bertipe string

    protected $fillable = [
        'nik',
        'no_kk',
        'nama',
        'alamat_rumah',
        'RT',
        'jenis_kelamin',
        'agama',
        'tanggal_lahir',
        'tempat_lahir',
        'pendidikan',
        'pekerjaan',
        'status_pernikahan',
        'status_penduduk',
    ];

    // Definisikan relasi jika ada, contoh:
    // Satu warga bisa memiliki banyak iuran
    public function iuranWarga()
    {
        return $this->hasMany(IuranWarga::class, 'penanggung_jawab', 'nik');
    }
}
