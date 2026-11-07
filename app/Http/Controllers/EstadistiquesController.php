<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use App\Models\Concert;
use App\Models\Escenari;
use App\Models\Genere;
use Database\Seeders\EntradaSeeder;
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
        $generes = Genere::query()
            ->join('artista_genere', 'generes.id', '=', 'artista_genere.genere_id')
            ->join('artistes', 'artista_genere.artista_id', '=', 'artistes.id')
            ->join('concerts', 'artistes.id', '=', 'concerts.artista_id')
            ->join('entradas', 'concerts.id', '=', 'entradas.concert_id')
            ->select('generes.*')
            ->selectRaw('COUNT(entradas.id) as total_entrades')
            ->groupBy('generes.id', 'generes.nom')
            ->orderByDesc('total_entrades')
            ->get();
        
        return view ('estadistiques', compact('concerts', 'artistas', 'escenaris', 'generes'));
    }
}
