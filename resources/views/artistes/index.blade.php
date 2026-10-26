<!DOCTYPE html>
<html>
<head>
    <title>Artistes</title>
</head>
<body>
<h1>Artistes</h1>



<table border="1">
    <tr>
        <th>Nom</th>
        <th>País</th>
        <th>Actiu</th>
        <th>Accions</th>
    </tr>
    @foreach($artistes as $lechota)
        <tr>
            <td>{{ $lechota->nom }}</td>
            <td>{{ $lechota->pais }}</td>
            <td style="background-color: {{ $lechota->actiu ? '#4ade80' : '#9ca3af' }};">{{ $lechota->actiu ? 'Actiu' : 'Inactiu' }}</td>
            <td>
                <a href="{{ route('artistes.show', $lechota->id) }}">LINK a Show</a>
                <a href="{{ route('artistes.edit', $lechota->id) }}">LINK a Edit</a>
            </td>
        </tr>
    @endforeach
</table>
<a href="{{ route('artistes.create') }} ">Nou Artista</a>

</body>
</html>
