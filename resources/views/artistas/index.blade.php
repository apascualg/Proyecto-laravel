@extends('layouts.app')
<a href="{{ route('artistas.create') }}"> CREAR UN NOU ARTISTA
</a>
<table border="1">
    <tr>
        <th>Nombre</th>
        <th>Pais</th>
        <th>Bio</th>
        <th>Imagen</th>
        <th>Activo</th>
        <th> Link </th>
    </tr>
    @foreach($artistas as $lechota)
        <tr>
            <td>{{ $lechota->nom }}</td>
            <td>{{ $lechota->pais }}</td>
            <td>{{ $lechota->bio }}</td>
            <td>
                <img src="{{ $lechota->imatge_url }}" height="50">
             </td>

                @if($lechota->actiu)  <td style="background-color: green">
                @else <td style="background-color: grey">
            @endif
            </td>
            <td>
                <a href="{{ route('artistas.show', $lechota->id) }}"> LINK
                </a>
            </td>
            <td>
                <a href="{{ route('artistas.edit', $lechota->id) }}"> MODIFICAR
                </a>
            </td>
        </tr>
    @endforeach
</table>

