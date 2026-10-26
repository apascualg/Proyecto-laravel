@extends('layouts.app')

@vite('resources/css/css-custom.css')

    <!DOCTYPE html>
<html>
<head>
    <title>Comprar entrada</title>
</head>
<body>

<h1>Comprar entrada</h1>

<h2>{{ $concert->nom }}</h2>

<p>Artista: {{ $concert->artista->nom }}</p>

<p>Data: {{ $concert->data_hora }}</p>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p style="color: red;">{{ $error }}</p>
    @endforeach
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

</body>
</html>
