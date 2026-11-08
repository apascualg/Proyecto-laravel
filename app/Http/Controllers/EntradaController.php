<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use App\Models\Entrada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EntradaController extends Controller
{
    public function mevesentrades(): View
    {
        $entradas = Auth::user()
            ->entradas()
            ->with(['concert.artista', 'concert.escenari'])
            ->join('concerts', 'entradas.concert_id', '=', 'concerts.id')
            ->select('entradas.*')
            ->orderBy('concerts.data_hora')
            ->get();

        return view('entrades.meves', compact('entradas'));
    }

    public function create(Concert $concert): View
    {
        $concert->load(['artista', 'escenari']);

        return view('entrades.create', compact('concert'));
    }

    public function store(Request $request, Concert $concert)
    {
        $concert->load('escenari');

        if ($concert->entradas->count() >= $concert->escenari->aforament_maxim) {
            return back()->withErrors(['aforament' => 'Aquest concert està ple.']);
        }
        if ($concert->entradas()->where('user_id', Auth::id())->count() > 0) {
            return back()->withErrors(['duplicada' => 'Ja tens una entrada per aquest concert.']);
        }
        $validated = $request->validate([
            'preu_pagat' => [
                'required',
                'numeric',
                'min:0',
                'max:999999.99',
            ],
        ]);

        Entrada::create([
            'user_id' => Auth::id(),
            'concert_id' => $concert->id,
            'preu_pagat' => $validated['preu_pagat'],
        ]);

        return redirect()
            ->route('entradas.meves')
            ->with('success', 'Entrada comprada correctament!');
    }

    public function assistents(Concert $concert): View
    {
        $concert->load(['escenari', 'artista']);

        $entradas = $concert->entradas()
            ->with('user')
            ->latest()
            ->get();

        return view('entrades.assistents', compact('concert', 'entradas'));
    }
}
