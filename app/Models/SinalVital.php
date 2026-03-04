<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SinalVital extends Model
{
    use HasFactory;

    protected $table = 'sinais_vitais';

    protected $fillable = [
        'avaliacao_id',
        'pressao_arterial',
        'frequencia_cardiaca',
        'frequencia_respiratoria',
        'saturacao_oxigenio',
    ];

    public function avaliacao(): BelongsTo
    {
        return $this->belongsTo(Avaliacao::class);
    }
}
