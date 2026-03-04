<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PlanoAlimentar extends Model
{
    use HasFactory;

    protected $table = 'planos_alimentares';

    protected $fillable = [
        'aluno_id',
        'personal_id',
        'nome',
        'data_inicio',
        'data_fim',
        'calorias_diarias',
        'proteinas',
        'carboidratos',
        'gorduras',
        'observacoes',
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

    public function refeicoes(): HasMany
    {
        return $this->hasMany(Refeicao::class, 'plano_id');
    }
}
