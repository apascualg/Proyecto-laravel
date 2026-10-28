@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Les meves entrades</h1>

        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif

        @if ($entradas->isEmpty())
            <p>Encara no has comprat cap entrada.</p>
        @else
            <table>
                <thead>
                <tr>
                    <th>Concert</th>
                    <th>Artista</th>
                    <th>Data del concert</th>
                    <th>Preu pagat</th>
                    <th>Codi d'entrada</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($entradas as $entrada)
                    <tr>
                        <td>
                            <a href="{{ route('concerts.show', $entrada->concert) }}">
                                {{ $entrada->concert->nom }}
                            </a>
                        </td>
                        <td>{{ $entrada->concert->artista->nom }}</td>
                        <td>{{ $entrada->concert->data_hora->format('d/m/Y H:i') }}</td>
                        <td>{{ number_format($entrada->preu_pagat, 2, ',', '.') }} €</td>
                        <td>{{ $entrada->codi_entrada }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
