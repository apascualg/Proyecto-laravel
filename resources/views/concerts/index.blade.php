@extends('layouts.app')
@vite('resources/css/css-custom.css')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<table border="1">
@foreach($concerts as $concert)
<tr>
    <th>Nom</th>
    <th>Artista</th>
    <th>Data</th>
    <th>Tipus</th>
    <th>Més informació</th>
    <th> Escenari </th>
</tr>
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
<a href="{{route('concerts.create')}}"> CREAR UN CONCERT NOU</a>

</body>
</html>
