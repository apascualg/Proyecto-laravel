<?php

namespace App\Models;

use App\Models\Concert;
use App\Models\Entrada;
use Illuminate\Database\Eloquent\Model;
use App\Models\Artista;


use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Genere extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'id',
        'nom',
            ];

    public function generes(): BelongsToMany
    {
        return $this->belongsToMany(Artista::class);

    }
    public function artistas(): BelongsToMany
    {
        return $this->belongsToMany(Entrada::class, Concert::class, Artista::class);

    }

}
