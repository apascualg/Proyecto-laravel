@extends('layouts.app')
@vite('resources/css/css-custom.css')
<!DOCTYPE html>
<html>
<head>
    <title>Concerts</title>
</head>
<body>
<h1>Artistas</h1>
<a href="{{ route('concerts.index') }}">Tornar</a>

<div>
    <h2> {{ $concert->nom }} </h2>
</div>
<table border="1">
    <tr>
        <th>Nom</th>
        <th>Artista</th>
        <th>Data</th>
        <th>Tipus</th>
        <th>Escenari</th>
        <th>Aforament</th>
    </tr>
        <tr>
            <td>{{ $concert->nom }}</td>
            <td>{{ $concert->artista->nom }}</td>
            <td>{{ $concert->data_hora }}</td>
            <td style="background-color: @if($concert->tipus == 'CONCERT') black @elseif($concert->tipus == 'DJ_SET') pink @elseif($concert->tipus == 'SHOWCASE') blue @elseif($concert->tipus == 'ACUSTIC') red @else transparent @endif;">
            </td>
            <td> {{$concert->escenari->nom}}</td>
            <td> {{$concert->escenari->aforament_maxim}}</td>
        </tr>
</table>
</body>
<script>
</script>
</html>

