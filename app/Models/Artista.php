<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Concert;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Artista extends Model
{
    protected $fillable = [
        'id',
        'artista_id',
        'bio',
        'imatge_url',
        'actiu',
    ];
    protected $casts = [
        'data_hora' => 'datetime',
        'actiu' => 'boolean',
    ];

    public function concerts(): HasMany
    {
        return $this->hasMany(Concert::class);
    }

}
