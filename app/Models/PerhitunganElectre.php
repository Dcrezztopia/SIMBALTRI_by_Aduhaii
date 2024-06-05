<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerhitunganElectre extends Model
{
    use HasFactory;

    protected $table = 'perhitungan_electre';
    protected $fillable = [
        'raw_data'
    ];
}
