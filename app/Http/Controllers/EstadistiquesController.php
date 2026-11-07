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
            ->join('artistas', 'artista_genere.artista_id', '=', 'artistas.id')
            ->join('concerts', 'artistas.id', '=', 'concerts.artista_id')
            ->join('entradas', 'concerts.id', '=', 'entradas.concert_id')
            ->select('generes.id', 'generes.nom')
            ->selectRaw('COUNT(DISTINCT entradas.id) as total_entrades')
            ->groupBy('generes.id', 'generes.nom')
            ->orderByDesc('total_entrades')
            ->get();

        $escenaris2 = Escenari::with('concerts.entradas')->get();

        foreach ($escenaris2 as $escenari) {
            $entradesVenudes = 0;
            $numConcerts = $escenari->concerts->count();
            foreach ($escenari->concerts as $concert) {
                $entradesVenudes += $concert->entradas->count();
            }
            if ($escenari->aforament_maxim > 0 && $numConcerts > 0) {
                $escenari->ocupacio_mitjana = round(
                    ($entradesVenudes / ($escenari->aforament_maxim * $numConcerts)) * 100,
                    2
                )*100;
            } else {
                $escenari->ocupacio_mitjana = 0;
            }
        }
        return view ('estadistiques', compact('concerts', 'artistas', 'escenaris', 'generes', 'escenaris2'));
    }
}
