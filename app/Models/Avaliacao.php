<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Avaliacao extends Model
{
    use HasFactory;

    protected $table = 'avaliacoes';

    protected $fillable = [
        'aluno_id',
        'personal_id',
        'data_avaliacao',
        'peso',
        'altura',
        'imc',
        'gordura_corporal',
        'massa_muscular',
    ];

    protected $casts = [
        'data_avaliacao' => 'date',
        'peso' => 'decimal:2',
        'altura' => 'decimal:2',
        'imc' => 'decimal:2',
        'gordura_corporal' => 'decimal:1',
        'massa_muscular' => 'decimal:2',
    ];

    public function aluno(): BelongsTo
    {
        return $this->belongsTo(Aluno::class);
    }

    public function personal(): BelongsTo
    {
        return $this->belongsTo(Personal::class);
    }

    public function dobrasCutaneas(): HasOne
    {
        return $this->hasOne(DobraCutanea::class);
    }

    public function medidasCorporais(): HasOne
    {
        return $this->hasOne(MedidaCorporal::class);
    }

    public function sinaisVitais(): HasOne
    {
        return $this->hasOne(SinalVital::class);
    }
}
