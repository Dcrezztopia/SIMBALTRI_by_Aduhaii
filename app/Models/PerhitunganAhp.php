<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerhitunganAhp extends Model
{
    use HasFactory;

    protected $table = 'perhitungan_ahp';
    protected $fillable = [
        'raw_data'
    ];
}
