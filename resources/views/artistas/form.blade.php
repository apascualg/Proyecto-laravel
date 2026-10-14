<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
    <title>Nuevo artista</title>
</head>
<body>
<h1>Nuevo artista</h1>

<a href="{{ route('artistas.index') }}">Tornar</a>
<!-- Action te lleva a una ruta con POST casi siempre -->
<!-- route es el nombre que le has puesto a la ruta tu mismo en web.php -->
<h1>{{ $vista == 'update' ? 'Modificar ' . $artista->nom : 'Crear un nuevo artista' }}</h1>
<form action="{{ $vista == 'update' ? route('artistas.update', $artista->id) : route('artistas.store') }}" method="POST">
    <!-- esto  hay que ponerlo siempre-->
    <!-- habeis oido hablar de cors -->
    @csrf
    @if($vista == 'update')
        <input type="hidden" name="_method" value="PUT">
    @endif

    <p>
        <label for="nom">Nombre:</label><br>
        <input type="text" name="nom" id="nom" value="{{ old('nom', $artista->nom ?? '') }}">
        @error('nom') <span style="color: red"> {{ $message }} </span> @enderror
    </p>

    <p>
        <label for="pais">País:</label><br>
        <input type="text" name="pais" id="pais" value="{{ old('pais', $artista->pais ?? '') }}">
        @error('pais') <span style="color: red"> {{ $message }} </span> @enderror
    </p>

    <p>
        <label for="bio">Bio:</label><br>
        <textarea name="bio" id="bio">{{ old('bio', $artista->bio ?? '') }}</textarea>
    </p>

    <p>
        <label for="imatge_url">Imatge (URL):</label><br>
        <input type="text" name="imatge_url" id="imatge_url" value="{{ old('imatge_url', $artista->imatge_url ?? '') }}">
    </p>

    <p>
        <label for="estat">Estat:</label>
        <input type="checkbox" name="estat" id="estat" value="1"
            {{ old('estat', $artista->estat ?? false) ? 'checked' : '' }}>
    </p>

    <p>
        <button type="submit">{{ $vista == 'update' ? 'Modificar' : 'Crear' }}</button>
    </p>
</form>

</body>
</html>
