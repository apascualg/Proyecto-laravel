@extends('layouts.app')

@vite('resources/css/css-custom.css')

<!DOCTYPE html>
<html>
<head>
    <title>Les meves entrades</title>
</head>
<body>

<h1>Les meves entrades</h1>

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

@if ($entradas->isEmpty())
    <p>Encara no tens cap entrada.</p>
@else
    <table border="1">
        <tr>
            <th>Concert</th>
            <th>Artista</th>
            <th>Data del concert</th>
            <th>Escenari</th>
            <th>Preu pagat</th>
            <th>Codi d'entrada</th>
            <th>Data de compra</th>
        </tr>

        @foreach ($entradas as $entrada)
            <tr>
                <td>{{ $entrada->concert->nom }}</td>
                <td>{{ $entrada->concert->artista->nom }}</td>
                <td>{{ $entrada->concert->data_hora }}</td>
                <td>{{ $entrada->concert->escenari->nom }}</td>
                <td>{{ number_format($entrada->preu_pagat, 2) }} €</td>
                <td>{{ $entrada->codi_entrada }}</td>
                <td>{{ $entrada->created_at }}</td>
            </tr>
        @endforeach
    </table>
@endif

</body>
</html>
