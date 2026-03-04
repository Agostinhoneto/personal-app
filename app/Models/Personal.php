<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Personal extends Model
{
    use HasFactory;

    protected $table = 'personais';

    protected $fillable = [
        'usuario_id',
        'cref',
        'especialidade',
        'biografia',
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class);
    }

    public function alunos(): HasMany
    {
        return $this->hasMany(Aluno::class);
    }

    public function avaliacoes(): HasMany
    {
        return $this->hasMany(Avaliacao::class);
    }

    public function treinos(): HasMany
    {
        return $this->hasMany(Treino::class);
    }

    public function categoriasTreino(): HasMany
    {
        return $this->hasMany(CategoriaTreino::class);
    }

    public function exercicios(): HasMany
    {
        return $this->hasMany(Exercicio::class);
    }

    public function planosAlimentares(): HasMany
    {
        return $this->hasMany(PlanoAlimentar::class);
    }

    public function planosAssinatura(): HasMany
    {
        return $this->hasMany(PlanoAssinatura::class);
    }
}
