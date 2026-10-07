<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Artista;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Concert extends Model
{
    protected $fillable = [
        'artista_id',
        'nom',
        'data_hora',
        'durada_minuts',
        'tipus',
    ];

    protected $casts = [
        'data_hora' => 'datetime',
    ];

    public function artista(): BelongsTo
    {
        return $this->belongsTo(Artista::class);
    }

}

