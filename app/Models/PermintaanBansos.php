<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanBansos extends Model
{
    use HasFactory;

    protected $table = 'permintaan_bansos';
    protected $fillable = [
	    'nik',
	    'nama',
	    'tempat_lahir',
	    'tanggal_lahir',
	    'jenis_kelamin',
	    'alamat',
	    'kewarganegaraan',
	    'tagihan_listrik',
	    'tagihan_air',
	    'jenis_tagihan_air',
    ];
    public $timestamps = false;

    protected $hidden = [
    ];
}
