<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RefeicaoAlimento extends Model
{
    use HasFactory;

    protected $table = 'refeicao_alimentos';

    protected $fillable = [
        'refeicao_id',
        'alimento_id',
        'quantidade',
        'unidade',
        'observacoes',
    ];

    protected $casts = [
        'quantidade' => 'decimal:2',
    ];

    public function refeicao(): BelongsTo
    {
        return $this->belongsTo(Refeicao::class);
    }

    public function alimento(): BelongsTo
    {
        return $this->belongsTo(Alimento::class);
    }
}
