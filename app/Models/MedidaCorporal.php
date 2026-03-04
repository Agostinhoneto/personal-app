<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MedidaCorporal extends Model
{
    use HasFactory;

    protected $table = 'medidas_corporais';

    protected $fillable = [
        'avaliacao_id',
        'torax',
        'cintura',
        'abdomen',
        'quadril',
        'braco_direito',
        'braco_esquerdo',
        'antebraco_direito',
        'antebraco_esquerdo',
        'coxa_direita',
        'coxa_esquerda',
        'panturrilha_direita',
        'panturrilha_esquerda',
    ];

    protected $casts = [
        'torax' => 'decimal:1',
        'cintura' => 'decimal:1',
        'abdomen' => 'decimal:1',
        'quadril' => 'decimal:1',
        'braco_direito' => 'decimal:1',
        'braco_esquerdo' => 'decimal:1',
        'antebraco_direito' => 'decimal:1',
        'antebraco_esquerdo' => 'decimal:1',
        'coxa_direita' => 'decimal:1',
        'coxa_esquerda' => 'decimal:1',
        'panturrilha_direita' => 'decimal:1',
        'panturrilha_esquerda' => 'decimal:1',
    ];

    public function avaliacao(): BelongsTo
    {
        return $this->belongsTo(Avaliacao::class);
    }
}
