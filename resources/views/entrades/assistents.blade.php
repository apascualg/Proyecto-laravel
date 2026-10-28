@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Assistents</h1>

        <h2>{{ $concert->nom }}</h2>

        <p>Artista: {{ $concert->artista->nom }}</p>
        <p>Escenari: {{ $concert->escenari->nom }}</p>

        <p>
            {{ $entradas->count() }}
            @if ($concert->escenari)
                / {{ $concert->escenari->aforament_maxim }}
            @endif
            entrades venudes
        </p>

        <table>
            <thead>
            <tr>
                <th>Nom</th>
                <th>Data de compra</th>
                <th>Codi d'entrada</th>
            </tr>
            </thead>

            <tbody>
            @forelse ($entradas as $entrada)
                <tr>
                    <td>{{ $entrada->user->name }}</td>
                    <td>{{ $entrada->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $entrada->codi_entrada }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Encara no hi ha assistents per aquest concert.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <a href="{{ route('concerts.show', $concert) }}">Tornar al concert</a>
    </div>
@endsection
