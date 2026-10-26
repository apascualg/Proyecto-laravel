<!DOCTYPE html>
<html>
<head>
    <title>Artista</title>
</head>
<body>
<h1>{{$a=="update" ? 'Editar artista' : 'Nou artista' }}</h1>

<a href="{{ route('artistes.index') }}">Tornar</a>

<!-- Action te lleva a una ruta con POST casi siempre -->
<!-- route es el nombre que le has puesto a la ruta tu mismo en web.php -->
@if ($a=="create")
<form action="{{ route('artistes.store') }}" method="POST">
    @endif
    @if ($a=="update")
        <form action="{{ route('artistes.update', $artista) }}" method="POST">        @method('PUT')
            @endif
    <!-- esto  hay que ponerlo siempre-->
    @csrf

    <p>
        <label>Nom:</label><br>
        <input type="text" name="nom" value="{{ old('nom', $artista->nom ?? '') }}">
        @error('nom') <span style="color:red">{{ $message }}</span> @enderror

    </p>
    <p>
        <label>Pais:</label><br>
        <input type="text" name="pais" value="{{ old('pais', $artista->pais ?? '') }}">
        @error('pais') <span style="color:red">{{ $message }}</span> @enderror

    </p>
    <p>
        <label>Bio:</label><br>
        <input type="text" name="bio" value="{{ old('bio', $artista->bio ?? '') }}">
        @error('bio') <span style="color:red">{{ $message }}</span> @enderror

    </p>
    <p>
        <label>imatge_url:</label><br>
        <input type="text" name="imatge_url" value="{{ old('imatge_url', $artista->imatge_url ?? '') }}">
        @error('imatge_url') <span style="color:red">{{ $message }}</span> @enderror

    </p>

    <p>
        <label>
            <input type="checkbox" name="actiu" value="1" {{ old('actiu', $a=="update" &&  $artista->actiu ?? true) ? 'checked' : '' }}>
            Actiu:
        </label>
        @error('actiu') <span style="color:red">{{ $message }}</span> @enderror

    </p>
    <p>
        <button type="submit">{{$a=="update" ? 'Guardar canvis' : 'Nou Artista' }}</button>
    </p>
</form>

</body>
</html>
