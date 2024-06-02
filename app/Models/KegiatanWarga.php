<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KegiatanWarga extends Model
{
    use HasFactory;

    protected $table = 'kegiatan_warga';
    protected $primaryKey = 'kegiatan_id';
    protected $guarded = [];
}
