<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Treino extends Model
{
    use HasFactory;

    protected $fillable = [
        'aluno_id',
        'personal_id',
        'nome',
        'data_inicio',
        'data_fim',
        'objetivo',
        'status',
    ];

    protected $casts = [
        'data_inicio' => 'date',
        'data_fim' => 'date',
    ];

    public function aluno(): BelongsTo
    {
        return $this->belongsTo(Aluno::class);
    }

    public function personal(): BelongsTo
    {
        return $this->belongsTo(Personal::class);
    }

    public function exercicios(): HasMany
    {
        return $this->hasMany(TreinoExercicio::class);
    }
}
