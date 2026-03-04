<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Refeicao extends Model
{
    use HasFactory;

    protected $table = 'refeicoes';

    protected $fillable = [
        'plano_id',
        'nome',
        'horario',
        'ordem',
    ];

    protected $casts = [
        'horario' => 'datetime:H:i',
    ];

    public function plano(): BelongsTo
    {
        return $this->belongsTo(PlanoAlimentar::class, 'plano_id');
    }

    public function alimentos(): HasMany
    {
        return $this->hasMany(RefeicaoAlimento::class);
    }
}
