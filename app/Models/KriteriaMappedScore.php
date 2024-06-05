<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaMappedScore extends Model
{
    use HasFactory;

    protected $table = 'kriteria_mapped_score';
    protected $fillable = [
        'kriteria_id',
        'value',
        'score'
    ];
    public $timestamps = false;
    public function kriteriaBansos()
    {
        return $this->belongsTo(KriteriaBansos::class, 'kriteria_id', 'id');
    }
}
