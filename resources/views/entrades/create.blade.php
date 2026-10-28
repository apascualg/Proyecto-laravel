@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Comprar entrada</h1>

        <h2>{{ $concert->nom }}</h2>

        <p>Artista: {{ $concert->artista->nom }}</p>
        <p>Data: {{ $concert->data_hora->format('d/m/Y H:i') }}</p>
        <p>Escenari: {{ $concert->escenari->nom }}</p>

        @if ($errors->any())
            <div role="alert">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('entradas.store', $concert) }}">
            @csrf

            <label for="preu_pagat">Preu pagat (€):</label>

            <input
                type="number"
                id="preu_pagat"
                name="preu_pagat"
                min="0"
                max="999999.99"
                step="0.01"
                value="{{ old('preu_pagat', 50) }}"
                required
            >

            <button type="submit">Comprar entrada</button>
        </form>

        <a href="{{ route('concerts.show', $concert) }}">Tornar al concert</a>
    </div>
@endsection
