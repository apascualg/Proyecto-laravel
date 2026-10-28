@extends('layouts.app')

@section('content')
    @vite('resources/css/css-custom.css')

    <div class="container">
        <h1>Detalls del concert</h1>

        <a href="{{ route('concerts.index') }}">Tornar als concerts</a>

        <h2>{{ $concert->nom }}</h2>

        <table border="1">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Artista</th>
                <th>Data</th>
                <th>Tipus</th>
                <th>Escenari</th>
                <th>Aforament màxim</th>
                <th>Entrades venudes</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>{{ $concert->nom }}</td>
                <td>{{ $concert->artista->nom }}</td>
                <td>{{ $concert->data_hora->format('d/m/Y H:i') }}</td>
                <td>{{ $concert->tipus }}</td>
                <td>{{ $concert->escenari->nom }}</td>
                <td>{{ $concert->escenari->aforament_maxim }}</td>
                <td>{{ $concert->entradas()->count() }}</td>
            </tr>
            </tbody>
        </table>

        <br>

        <a href="{{ route('entradas.create', $concert) }}">
            Comprar entrada
        </a>

        <br><br>

        <a href="{{ route('entradas.assistants', $concert) }}">
            Veure assistents
        </a>

        <br><br>

        <a href="{{ route('entradas.meves') }}">
            Les meves entrades
        </a>
    </div>
@endsection
