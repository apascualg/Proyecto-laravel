<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Artista;
use App\Models\Escenari;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Concert extends Model
{
    protected $fillable = [
        'artista_id',
        'escenari_id',
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
    public function escenari(): BelongsTo
    {
        return $this->belongsTo(Escenari::class);
    }
    public function entradas(): HasMany
    {
        return $this->hasMany(Entrada::class);
    }


}

