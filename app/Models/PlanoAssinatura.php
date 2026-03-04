<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PlanoAssinatura extends Model
{
    use HasFactory;

    protected $table = 'planos_assinatura';

    protected $fillable = [
        'personal_id',
        'nome',
        'descricao',
        'valor',
        'duracao_dias',
    ];

    protected $casts = [
        'valor' => 'decimal:2',
    ];

    public function personal(): BelongsTo
    {
        return $this->belongsTo(Personal::class);
    }

    public function assinaturas(): HasMany
    {
        return $this->hasMany(Assinatura::class, 'plano_id');
    }
}
