<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DobraCutanea extends Model
{
    use HasFactory;

    protected $table = 'dobras_cutaneas';

    protected $fillable = [
        'avaliacao_id',
        'tricipital',
        'subescapular',
        'peitoral',
        'axilar_media',
        'suprailiaca',
        'abdominal',
        'coxa',
    ];

    protected $casts = [
        'tricipital' => 'decimal:1',
        'subescapular' => 'decimal:1',
        'peitoral' => 'decimal:1',
        'axilar_media' => 'decimal:1',
        'suprailiaca' => 'decimal:1',
        'abdominal' => 'decimal:1',
        'coxa' => 'decimal:1',
    ];

    public function avaliacao(): BelongsTo
    {
        return $this->belongsTo(Avaliacao::class);
    }
}
