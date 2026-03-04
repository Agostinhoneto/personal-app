<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pagamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'assinatura_id',
        'valor',
        'data_pagamento',
        'forma_pagamento',
        'status',
    ];

    protected $casts = [
        'valor' => 'decimal:2',
        'data_pagamento' => 'date',
    ];

    public function assinatura(): BelongsTo
    {
        return $this->belongsTo(Assinatura::class);
    }
}
