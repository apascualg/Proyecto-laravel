<?php

namespace App\Models;

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

    public function artistes(): BelongsToMany
    {
        return $this->belongsToMany(Artista::class);

    }
}
