<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoriaTreino extends Model
{
    use HasFactory;

    protected $table = 'categorias_treino';

    protected $fillable = [
        'personal_id',
        'nome',
        'descricao',
    ];

    public function personal(): BelongsTo
    {
        return $this->belongsTo(Personal::class);
    }

    public function exercicios(): HasMany
    {
        return $this->hasMany(Exercicio::class, 'categoria_id');
    }
}
