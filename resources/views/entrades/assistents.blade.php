@extends('layouts.app')

@vite('resources/css/css-custom.css')

<!DOCTYPE html>
<html>
<head>
    <title>Assistents</title>
</head>
<body>

<h1>Assistents</h1>

<h2>{{ $concert->nom }}</h2>

<a href="{{ route('concerts.index') }}">Tornar als concerts</a>

<table border="1">
    <tr>
        <th>Nom</th>
        <th>Email</th>
        <th>Codi d'entrada</th>
        <th>Data de compra</th>
    </tr>

    @forelse ($entradas as $entrada)
        <tr>
            <td>{{ $entrada->user->name }}</td>
            <td>{{ $entrada->user->email }}</td>
            <td>{{ $entrada->codi_entrada }}</td>
            <td>{{ $entrada->created_at }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="4">Encara no hi ha assistents per aquest concert.</td>
        </tr>
    @endforelse
</table>

</body>
</html>
