<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use App\Models\Entrada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntradaController extends Controller
{
    public function mevesentrades()
    {
        $entradas = Auth::user()
            ->entradas()
            ->with('concert.artista', 'concert.escenari')
            ->latest()
            ->get();

        return view('entrades.meves', compact('entradas'));
    }

    public function create(Concert $concert)
    {
        return view('entrades.create', compact('concert'));
    }

    public function store(Request $request, Concert $concert)
    {
        $validated = $request->validate([
            'preu_pagat' => ['required', 'numeric', 'min:0', 'max:999999.99'],
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

    public function assistents(Concert $concert)
    {
        $entradas = $concert->entradas()
            ->with('user')
            ->latest()
            ->get();

        return view('entrades.assistents', compact('concert', 'entradas'));
    }
}
