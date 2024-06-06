<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerbandinganKriteriaBansos extends Model
{
    use HasFactory;

    protected $table = 'perbandingan_kriteria';
    protected $fillable = [
        'right_id',
        'left_id',
        'right_val',
        'left_val',
    ];
    public $timestamps = false;
    protected $primaryKey = null;

    public function right()
    {
        return $this->belongsTo(KriteriaBansos::class, 'right_id', 'id');
    }

    public function left()
    {
        return $this->belongsTo(KriteriaBansos::class, 'left_id', 'id');
    }
}
