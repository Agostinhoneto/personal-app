<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Exercicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'personal_id',
        'nome',
        'categoria_id',
        'descricao',
        'video_url',
        'imagem',
    ];

    public function personal(): BelongsTo
    {
        return $this->belongsTo(Personal::class);
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(CategoriaTreino::class, 'categoria_id');
    }

    public function treinoExercicios(): HasMany
    {
        return $this->hasMany(TreinoExercicio::class);
    }
}
