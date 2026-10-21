@extends('layouts.app')
@section('content')
    @vite('resources/css/css-custom.css')
<form action="{{route('concerts.store')}}" method="POST">
    @csrf
    <p>
        <label for="artista_id"> Artista: </label>
        <select name="artista_id" id="artista">
            @foreach ($artistes as $artista)
                <option value="{{ $artista->id }}">{{ $artista->nom }}</option>
            @endforeach
        </select>

    </p>
    <p>
        <label for="nom">Nombre:</label><br>
        <input type="text" name="nom" id="nom">
        @error('nom') <span style="color: red"> {{ $message }} </span> @enderror

    </p>

    <p>
        <label for="data_hora">Data:</label><br>
        <input type="datetime-local" name="data_hora" id="data">
        @error('data_hora') <span style="color: red"> {{ $message }} </span> @enderror

    </p>

    <p>
        <label for="durada_minuts">Durada:</label><br>
        <input type="number" name="durada_minuts" id="durada">
        @error('data_hora') <span style="color: red"> {{ $message }} </span> @enderror
    </p>

    <p>
        <label for="tipus"> Tipus:</label>
        <select name="tipus" id="tipus">
            @foreach (['CONCERT', 'DJ_SET', 'SHOWCASE', 'ACUSTIC'] as $t)
                <option value="{{ $t }}">{{ $t }}</option>
            @endforeach
        </select>
    </p>
    <p>
        <label for="escenari_id"> Escenari:</label>
        <select name="escenari_id" id="escenari">
            @foreach ($escenaris as $escenari)
                <option value="{{ $escenari->id }}">{{ $escenari->nom }}</option>
            @endforeach
        </select>
    </p>

    <p>
        <button type="submit">Crear</button>
    </p>
</form>
<style>
    button{
        padding:10px 20px;
        background-color: #d4d7dc;
    }
    h1{
        font-size: 20px !important;
    }
    a{
        text-decoration: underline;
    }
</style>
@endsection
