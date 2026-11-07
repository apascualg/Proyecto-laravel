@extends('layouts.app')
@vite('resources/css/css-custom.css')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1> Els 5 concerts amb més entrades </h1>
<table>
    <tr>
        <th>Nom</th>
        <th>Artista</th>
        <th>Data</th>
        <th>Tipus</th>
        <th>Més informació</th>
        <th> Escenari </th>
        <th> Entrades venudes </th>
    </tr>
    @foreach($concerts as $concert)
        <tr>
            <td> {{ $concert -> nom  }}</td>
            <td>{{ $concert->artista->nom }}</td>
            <td> {{ $concert -> data_hora  }}</td>
            <td style="background-color: @if($concert->tipus == 'CONCERT') black @elseif($concert->tipus == 'DJ_SET') white @elseif($concert->tipus == 'SHOWCASE') blue @elseif($concert->tipus == 'ACUSTIC') red @else transparent @endif;">
            </td>
            <td> <a href="{{route('concerts.show', $concert -> id)}}"> Veure</a></td>
            <td> {{$concert -> escenari -> nom }} </td>
            <td>{{$concert -> entradas -> count()}}</td>
        </tr>
    @endforeach
</table>
<h1> Els 5 artistes amb més concerts </h1>
<table border="1">
    <tr>
        <th>Nombre</th>
        <th>Pais</th>
        <th>Bio</th>
        <th>Imagen</th>
        <th>Activo</th>
        <th> Link </th>
        <th></th>
        <th> Número de concerts </th>
    </tr>
    @foreach($artistas as $artista)
        <tr>
            <td>{{ $artista->nom }}</td>
            <td>{{ $artista->pais }}</td>
            <td>{{ $artista->bio }}</td>
            <td>
                <img src="{{ $artista->imatge_url }}" height="50">
            </td>

            @if($artista->actiu)  <td style="background-color: green">
            @else <td style="background-color: grey">
                @endif
            </td>
            <td>
                <a href="{{ route('artistas.show', $artista->id) }}"> LINK
                </a>
            </td>
            <td>
                <a href="{{ route('artistas.edit', $artista->id) }}"> MODIFICAR
                </a>
            </td>
            <td>
                {{ $artista->concerts->count() }}
            </td>
        </tr>
    @endforeach
</table>

<h1> Recaptació total per escenari </h1>
<table>
    <thead>
    <th>Nom de l'escenari</th>
    <th>Quantitat recaptada</th>
    </thead>
    @foreach($escenaris as $escenari)
        <tr>
            <td>
                {{$escenari -> nom}}
            </td>
        <td>
            {{$escenari -> entradas -> sum('preu_pagat') }}
        </td>
        </tr>
    @endforeach
</table>
<h1> Els generes més populars </h1>
<table>
    <tr>
        <th> Nom </th>
        <th> Quantitat </th>
    </tr>
@foreach($generes as $genere)
    <tr>
        <td> {{$genere -> nom}}</td>
        <td>{{$genere -> total_entrades}}</td>
    </tr>
@endforeach
</table>

<h1> Ocupació mitjana per escenari </h1>
<table>
    <tr>
        <th>
            Nom de l'escenari
        </th>
        <th>
            Ocupació mitjana
        </th>
    </tr>
    @foreach($escenaris2 as $escenari)
        <tr>
            <td>
                {{$escenari -> nom}}
            </td>
            <td>
                {{$escenari -> ocupacio_mitjana}}
            </td>
        </tr>
    @endforeach
</table>
</body>
</html>
