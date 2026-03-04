<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegistroTreino extends Model
{
    use HasFactory;

    protected $table = 'registros_treino';

    protected $fillable = [
        'treino_exercicio_id',
        'aluno_id',
        'data',
        'series_realizadas',
        'repeticoes_realizadas',
        'carga_utilizada',
        'percepcao_esforco',
        'observacoes',
    ];

    protected $casts = [
        'data' => 'date',
        'carga_utilizada' => 'decimal:2',
    ];

    public function treinoExercicio(): BelongsTo
    {
        return $this->belongsTo(TreinoExercicio::class);
    }

    public function aluno(): BelongsTo
    {
        return $this->belongsTo(Aluno::class);
    }
}
