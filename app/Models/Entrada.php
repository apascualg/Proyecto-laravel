<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Entrada extends Model
{
    protected $fillable = [
        'user_id',
        'concert_id',
        'preu_pagat',
        'codi_entrada',
    ];

    protected static function booted(): void
    {
        static::creating(function (Entrada $entrada) {
            if (empty($entrada->codi_entrada)) {
                $entrada->codi_entrada = strtoupper(Str::random(12));
            }
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function concert(): BelongsTo
    {
        return $this->belongsTo(Concert::class);
    }
}
