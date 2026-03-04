<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'personal_id',
        'data_nascimento',
        'sexo',
        'objetivo',
    ];

    protected $casts = [
        'data_nascimento' => 'date',
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class);
    }

    public function personal(): BelongsTo
    {
        return $this->belongsTo(Personal::class);
    }

    public function avaliacoes(): HasMany
    {
        return $this->hasMany(Avaliacao::class);
    }

    public function treinos(): HasMany
    {
        return $this->hasMany(Treino::class);
    }

    public function registrosTreino(): HasMany
    {
        return $this->hasMany(RegistroTreino::class);
    }

    public function planosAlimentares(): HasMany
    {
        return $this->hasMany(PlanoAlimentar::class);
    }

    public function assinaturas(): HasMany
    {
        return $this->hasMany(Assinatura::class);
    }
}
