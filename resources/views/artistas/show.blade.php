@extends('layouts.app')
@vite('resources/css/css-custom.css')
<!DOCTYPE html>
<html>
<head>
    <title>Artistas</title>
</head>
<body>
<h1>Artistas</h1>
<a href="{{ route('artistas.index') }}">Tornar</a>

<div>
    <h2> {{ $artista->nom }} </h2>
    <img src="{{ $artista->imatge_url }}" style="object-fit: contain">
    @if($artista-> actiu == false)
        <p> NO ESTÁ ACTIVO </p>
    @else
        <p> ESTÁ ACTIVO </p>
    @endif

</div>
<table border="1">
    <tr>
        <th>Nombre</th>
        <th>Pais</th>
        <th>Bio</th>
        <th>Imagen</th>
        <th>Activo</th>
        <th> Link </th>
    </tr>
        <tr>
            <td>{{ $artista->nom }}</td>
            <td>{{ $artista->pais }}</td>
            <td>{{ $artista->bio }}</td>
            <td>
                <img src="{{ $artista->imatge_url }}" height="50">
            </td>

            @if($artista->actiu == true)  <td style="background-color: green">
            @else <td style="background-color: grey">
                @endif
            </td>
        </tr>
</table>
@if ($artista->concerts->count() > 0)
    <h3>Concerts programats</h3>
    <ul>
        @foreach ($artista->concerts as $concert)
            <li>{{ $concert->nom }} — {{ $concert->data_hora->format('d/m/Y H:i') }}</li>
        @endforeach
    </ul>
@else
    <p>Encara no té concerts programats.</p>
@endif

</body>
<script>
</script>
</html>

