<!DOCTYPE html>
<html>
<head>
    <title>{{ $artista->nom }}</title>
</head>
<body>
<h1>{{ $artista->nom }}</h1>

<a href="{{ route('artistes.index') }}">Tornar</a>

<table border="1">
    <tr><th>ID</th><td>{{ $artista->id }}</td></tr>
    <tr><th>Nom</th><td>{{ $artista->nom }}</td></tr>
    <tr><th>Pais</th><td>{{ $artista->pais }}</td></tr>
    <tr><th>Bio</th><td>{{ $artista-> bio}}</td></tr>
    <tr><th>imatge_url</th><td>{{ $artista->imatge_url }}</td></tr>
    <tr><th>Actiu</th><td>{{ $artista->actiu ? 'Sí' : 'No' }}</td></tr>
    <tr><th>Data creacio</th><td>{{ $artista->created_at }}</td></tr>
    <tr><th>Data actualitzacio</th><td>{{ $artista->updated_at }}</td></tr>
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
<a href="{{ route('artistes.edit', $artista->id) }}">Editar</a>
</body>
</html>
