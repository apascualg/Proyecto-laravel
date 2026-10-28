<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use App\Models\Concert;
use App\Models\Escenari;
use Illuminate\Http\Request;

class EstadistiquesController extends Controller
{
    public function index()
    {
        $concerts = Concert::withCount('entradas')->orderBy('entradas_count', 'desc')->limit(5)->get();
        $artistas = Artista::withCount('concerts')->orderBy('concerts_count', 'desc')->limit(5)->get();
        $escenaris = Escenari::withSum(
            'entradas',
            'preu_pagat'
        )->get();
        return view ('estadistiques', compact('concerts', 'artistas'));
    }
}
