<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mensagem extends Model
{
    use HasFactory;

    protected $table = 'mensagens';

    protected $fillable = [
        'remetente_id',
        'destinatario_id',
        'assunto',
        'mensagem',
        'lida',
        'data_leitura',
    ];

    protected $casts = [
        'lida' => 'boolean',
        'data_leitura' => 'datetime',
    ];

    public function remetente(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'remetente_id');
    }

    public function destinatario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'destinatario_id');
    }

    public function anexos(): HasMany
    {
        return $this->hasMany(Anexo::class);
    }
}
