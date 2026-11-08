@extends('layouts.app')
<a href="{{route('concerts.create')}}"> CREAR UN CONCERT NOU</a>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form method="GET" action="{{ route('concerts.index') }}">

    <label for="escenari_id">Escenari:</label>
    <select name="escenari_id" id="escenari_id">
        <option value="">Tots</option>

        @foreach($escenaris as $escenari)
            <option value="{{ $escenari->id }}"
                {{ request('escenari_id') == $escenari->id ? 'selected' : '' }}>
                {{ $escenari->nom }}
            </option>
        @endforeach
    </select>

    <label for="genere_id">Gènere:</label>
    <select name="genere_id" id="genere_id">
        <option value="">Tots</option>

        @foreach($generes as $genere)
            <option value="{{ $genere->id }}"
                {{ request('genere_id') == $genere->id ? 'selected' : '' }}>
                {{ $genere->nom }}
            </option>
        @endforeach
    </select>

    <label for="data_inici">Data inicial:</label>
    <input
        type="date"
        name="data_inici"
        id="data_inici"
        value="{{ request('data_inici') }}"
    >

    <label for="data_fi">Data final:</label>
    <input
        type="date"
        name="data_fi"
        id="data_fi"
        value="{{ request('data_fi') }}"
    >
    <input type="text" name="cerca" placeholder="Cerca per nom" value="{{ request('cerca') }}">

    <button type="submit">Filtrar</button>

</form>
<table border="1">
    <tr>
        <th>Nom</th>
        <th>Artista</th>
        <th>Data</th>
        <th>Tipus</th>
        <th>Més informació</th>
        <th> Escenari </th>
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
</tr>
    @endforeach
</table>


</body>
</html>
