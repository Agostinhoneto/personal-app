<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Alimento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'porcao',
        'calorias',
        'proteinas',
        'carboidratos',
        'gorduras',
    ];

    protected $casts = [
        'proteinas' => 'decimal:2',
        'carboidratos' => 'decimal:2',
        'gorduras' => 'decimal:2',
    ];

    public function refeicoes(): HasMany
    {
        return $this->hasMany(RefeicaoAlimento::class);
    }
}
