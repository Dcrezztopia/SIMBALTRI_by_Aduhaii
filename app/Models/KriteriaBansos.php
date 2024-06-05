<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaBansos extends Model
{
    use HasFactory;

    protected $table = 'kriteria_bansos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'jenis',
        'jenis_score',
        'weight',
        'table_name',
        'column_name'
    ];
    public $timestamps = false;
}
